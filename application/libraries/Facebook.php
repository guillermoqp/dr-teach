<?php class Facebook {
    public function __construct($config=array()) {
        require_once APPPATH.'third_party/Facebook/autoload.php';
        $this->fb = new Facebook\Facebook($config);
        $this->permissions = ['public_profile','email','age_range'];
        $this->fb_helper = $this->fb->getRedirectLoginHelper();
    }
    public function loginURL($url) {
        return $this->fb_helper->getLoginUrl($url,$this->permissions);
    }
    public function authenticate($code = null) {
        return $this->client->authenticate($code);
    }
    public function getAccessToken() {
        try{
            $token = $this->fb_helper->getAccessToken();
            return array('token'=>$token, 'message' => '');
        }catch(Facebook\Exceptions\FacebookResponseException $e) {
            return array('token'=>false,'message' => 'There was an error while trying to login using Facebook: '.$e->getMessage());
        }catch(Facebook\Exceptions\FacebookSDKException $e)  {
            return array('token'=>false,'message'=>'Facebook SDK returned an error: '.$e->getMessage());
        }
    }
    public function setAccessToken($token) {
        if (!empty($token)) {
            $this->fb->setDefaultAccessToken($token);
        }
    }
    public function revokeToken() {
        return $this->client->revokeToken();
    }
    public function getUserInfo($permisosData) {
        try{ 
            $response = $this->fb->get($permisosData);
            return array('user_info'=>$response->getGraphUser(),'message'=>'');
        } catch(Facebook\Exceptions\FacebookResponseException $e) { 
            return array('user_info' => false, 'message' => 'Could not retrieve user data: '.$e->getMessage());
        } catch(Facebook\Exceptions\FacebookSDKException $e) { 
            return array('user_info' => false, 'message' => 'Facebook SDK returned an error: '.$e->getMessage());
        }
    }
}