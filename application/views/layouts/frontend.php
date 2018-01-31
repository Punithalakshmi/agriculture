<!DOCTYPE HTML>
<html>
	<head>

		<style>
.alert {
    padding: 20px;
    background-color: #f44336;
    color: white;
}

.closebtn {
    margin-left: 15px;
    color: white;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: black;
}
</style>
		
		
		<?php include_title(); ?>
        <?php include_metas(); ?>
        <?php include_links(); ?>
        <?php include_stylesheets(); ?>
        <?php include_raws() ?>
        
       <script>

			//declare global JS variables here
			var base_url = '<?php echo base_url();?>';
			var current_controller = '<?php echo $this->uri->segment(1, 'index');?>';
			var current_method = '<?php echo $this->uri->segment(2, 'index');?>';
            var folder_path = '<?php echo include_img_path(); ?>';			
		</script>
       
        
	</head>


	<body >

	<div id="container">

	
		<?php $this->load->view('_partials/header', $this->data); ?>
		
		<?php /*echo $this->load->view('frontend/_partials/menu', $this->data); */ ?>

		<div class="wrapper-iframe">
			<?php echo $content; ?>
		</div>

		<?php 

		$this->load->helper('cookie');
        $ip = "";
        $count=1;
        if(!is_logged_in()){

            $ip = $this->input->ip_address();
            $get_cookie = isset($_COOKIE['name'])?$_COOKIE['name']:"";
            if($get_cookie)
            {
                $decode = json_decode($get_cookie);
                if($decode->value == $ip)
                    $count= $decode->count+1;
            }
            
            
            $cookie = array(
            'count'=>$count,
            'name' => 'ip',
            'value' => $ip,
            'expire' => '86400'
         );
        //echo json_encode($cookie);exit;
        

        if($count>=5 && $count<=5){ 

          $this->data['user_msg'] = "Please login to get extra benefit for agriculture";

        }
        if($count>=6){
            $cookie = array(
            'count'=>1,
            'name' => 'ip',
            'value' => $ip,
            'expire' => '86400'
         );
        }
        setcookie('name',json_encode($cookie));
        }
		?>
		

		<?php $this->load->view('_partials/footer', $this->data); ?>

		

		<?php include_javascripts(); ?>
		
		<?php 
		
			if(is_array($this->init_scripts))
			{
				foreach ($this->init_scripts as $file)
					$this->load->view($file, $this->data);
			}
			
		?>
	  </div>	
	</body>
</html>
