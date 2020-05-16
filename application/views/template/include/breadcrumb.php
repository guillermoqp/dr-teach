<div class="content-header">
    <div class="header-section">
        <h1> 
        <?php if($this->uri->segment(1)!=null) { ?>
	    	<?php print(ucfirst($this->uri->segment(1))) ?><br>
		    <?php if($this->uri->segment(2)!=null) { ?>
		    	<small><?php print(ucfirst(str_replace("-"," ",$this->uri->segment(2)))) ?> >></small>
		    <?php } ?>
		    <?php if($this->uri->segment(3)!=null) { ?>
		    	<small><?php print(ucfirst(str_replace("-"," ",$this->uri->segment(3)))) ?> >></small>
		    <?php } ?>
		    <?php if($this->uri->segment(4)!=null) { ?>
		    	<small><?php print(ucfirst(str_replace("-"," ",$this->uri->segment(4)))) ?></small>
		    <?php } ?>
		<?php } ?>
        </h1>
    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><a href="<?php print(base_url()) ?>"><h4><i class="fa fa-home"></i> Inicio</h4></a></li>
    <?php if($this->uri->segment(1)!=null) { ?>
	    <li>
	        <a href="<?php print(base_url($this->uri->segment(1))) ?>" class="tip-bottom">
	        <?php print(ucfirst($this->uri->segment(1))) ?>
	        </a>
	    </li>
	    <?php if($this->uri->segment(2)!=null) { ?>
	    <li>
	        <a href="<?php print(base_url($this->uri->segment(1)."/".$this->uri->segment(2))) ?>" class="current tip-bottom">
	            <?php print(ucfirst(str_replace("-"," ",$this->uri->segment(2)))) ?>
	        </a>
	    </li>
	    <?php } ?>
	    <?php if($this->uri->segment(3)!=null) { ?>
	    <li>
	        <a href="<?php print(base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3))) ?>" class="current tip-bottom">
	            <?php print(ucfirst(str_replace("-"," ",$this->uri->segment(3)))) ?>
	        </a>
	    </li>
	    <?php } ?>
	    <?php if($this->uri->segment(4)!=null) { ?>
	    <li>
	        <a href="<?php print(base_url($this->uri->segment(1)."/".$this->uri->segment(2)."/".$this->uri->segment(3)."/".$this->uri->segment(4))) ?>" class="current tip-bottom">
	            <?php print(ucfirst(str_replace("-"," ",$this->uri->segment(4)))) ?>
	        </a>
	    </li>
	    <?php } ?>
	<?php } ?>
</ul>