<?php

error_reporting(E_ALL);

// we first include the upload class, as we will need it here to deal with the uploaded file
include('class.upload.php');

// retrieve eventual CLI parameters
$cli = (isset($argc) && $argc > 1);
if ($cli) {
    if (isset($argv[1])) $_GET['file'] = $argv[1];
    if (isset($argv[2])) $_GET['dir'] = $argv[2];
    if (isset($argv[3])) $_GET['pics'] = $argv[3];
}

// set variables
$dir_dest = (isset($_GET['dir']) ? $_GET['dir'] : 'profile');
$dir_pics = (isset($_GET['pics']) ? $_GET['pics'] : $dir_dest);

if (!$cli && !(isset($_SERVER['HTTP_X_FILE_NAME']) && isset($_SERVER['CONTENT_LENGTH']))) {




    // ---------- IMAGE UPLOAD ----------

    // we create an instance of the class, giving as argument the PHP object
    // corresponding to the file field from the form
    // All the uploads are accessible from the PHP object $_FILES
    $handle = new Upload($_FILES['upload']);
   // print_r($_POST);

    // then we check if the file has been uploaded properly
    // in its *temporary* location in the server (often, it is /tmp)
    if ($handle->uploaded) {

        //set post data
        $fields = 'data[Detail][category]=profil&data[Detail][model]='.$_POST['model'].'&data[Detail][foreign_key]='.$_POST['foreign_key'];
        
         // yes, the file is on the server
        // below are some example settings which can be used if the uploaded file is an image.
        $handle->image_resize            = true;
        $handle->image_ratio_y           = true;
        $handle->image_x                 = 300;

        // now, we start the upload 'process'. That is, to copy the uploaded file
        // from its temporary location to the wanted location
        // It could be something like $handle->Process('/home/www/my_uploads/');
        $handle->Process($dir_dest);

        // we check if everything went OK
        if ($handle->processed) {
            // everything was fine !
            /*
            echo '<p class="result">';
            echo '  <b>File uploaded with success</b><br />';
            echo '  <img src="'.$dir_pics.'/' . $handle->file_dst_name . '" />';
            $info = getimagesize($handle->file_dst_pathname);
            echo '  File: <a href="'.$dir_pics.'/' . $handle->file_dst_name . '">' . $handle->file_dst_name . '</a><br/>';
            echo '   (' . $info['mime'] . ' - ' . $info[0] . ' x ' . $info[1] .' -  ' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB)';
            echo '</p>';
            */
             $fields .= '&data[Photo][1][model]='.$_POST['model'].'&data[Photo][1][foreign_key]='.$_POST['foreign_key'].'&data[Photo][1][type]=1'.'&data[Photo][1][path]=http://1mtris.ingeniworks.com.my/schoolapps_upload/'.$dir_pics.'/'.$handle->file_dst_name;
              $photo_url[1] = array('url'=>'http://1mtris.ingeniworks.com.my/schoolapps_upload/'.$dir_pics.'/'.$handle->file_dst_name);
            } else {
            // one error occured
            echo '<p class="result">';
            echo '  <b>File not uploaded to the wanted location</b><br />';
            echo '  Error: ' . $handle->error . '';
            echo '</p>';
        }
        
        // yes, the file is on the server
        // below are some example settings which can be used if the uploaded file is an image.
        $handle->image_resize            = true;
        $handle->image_ratio_y           = true;
        $handle->image_x                 = 150;

        // now, we start the upload 'process'. That is, to copy the uploaded file
        // from its temporary location to the wanted location
        // It could be something like $handle->Process('/home/www/my_uploads/');
        $handle->Process($dir_dest);

        // we check if everything went OK
        if ($handle->processed) {
            // everything was fine !
            /*
            echo '<p class="result">';
            echo '  <b>File uploaded with success</b><br />';
            echo '  <img src="'.$dir_pics.'/' . $handle->file_dst_name . '" />';
            $info = getimagesize($handle->file_dst_pathname);
            echo '  File: <a href="'.$dir_pics.'/' . $handle->file_dst_name . '">' . $handle->file_dst_name . '</a><br/>';
            echo '   (' . $info['mime'] . ' - ' . $info[0] . ' x ' . $info[1] .' -  ' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB)';
            echo '</p>';*/
            
            $fields .= '&data[Photo][2][model]='.$_POST['model'].'&data[Photo][2][foreign_key]='.$_POST['foreign_key'].'&data[Photo][2][type]=2'.'&data[Photo][2][path]=http://1mtris.ingeniworks.com.my/schoolapps_upload/'.$dir_pics.'/'.$handle->file_dst_name;

             $photo_url[2] = array('url'=>'http://1mtris.ingeniworks.com.my/schoolapps_upload/'.$dir_pics.'/'.$handle->file_dst_name);
       
        } else {
            // one error occured
            echo '<p class="result">';
            echo '  <b>File not uploaded to the wanted location</b><br />';
            echo '  Error: ' . $handle->error . '';
            echo '</p>';
        }

        // we now process the image a second time, with some other settings
        $handle->image_resize            = true;
        $handle->image_ratio_crop        = true;
        $handle->image_x                 = 80;
        $handle->image_y                 = 80;
        
        

        $handle->Process($dir_dest);

        // we check if everything went OK
        if ($handle->processed) {
            // everything was fine !
            /*
            
            echo '<p class="result">';
            echo '  <b>File uploaded with success</b><br />';
            echo '  <img src="'.$dir_pics.'/' . $handle->file_dst_name . '" />';
            $info = getimagesize($handle->file_dst_pathname);
            echo '  File: <a href="'.$dir_pics.'/' . $handle->file_dst_name . '">' . $handle->file_dst_name . '</a><br/>';
            echo '   (' . $info['mime'] . ' - ' . $info[0] . ' x ' . $info[1] .' - ' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB)';
            echo '</p>';
            */
            
             $fields .= '&data[Photo][3][model]='.$_POST['model'].'&data[Photo][3][foreign_key]='.$_POST['foreign_key'].'&data[Photo][3][type]=3'.'&data[Photo][3][path]=http://1mtris.ingeniworks.com.my/schoolapps_upload/'.$dir_pics.'/'.$handle->file_dst_name;
             $photo_url[3] = array('url'=>'http://1mtris.ingeniworks.com.my/schoolapps_upload/'.$dir_pics.'/'.$handle->file_dst_name);
        } else {
            // one error occured
            echo '<p class="result">';
            echo '  <b>File not uploaded to the wanted location</b><br />';
            echo '  Error: ' . $handle->error . '';
            echo '</p>';
        }


        
          // we now process the image a second time, with some other settings
        $handle->image_resize            = true;
        $handle->image_ratio_crop        = true;
        $handle->image_x                 = 32;
        $handle->image_y                 = 32;
        
        
        //thumbnail 220 x 220
        $handle->Process($dir_dest);

        // we check if everything went OK
        if ($handle->processed) {
            // everything was fine !
            /*
            echo '<p class="result">';
            echo '  <b>File uploaded with success</b><br />';
            echo '  <img src="'.$dir_pics.'/' . $handle->file_dst_name . '" />';
            $info = getimagesize($handle->file_dst_pathname);
            echo '  File: <a href="'.$dir_pics.'/' . $handle->file_dst_name . '">' . $handle->file_dst_name . '</a><br/>';
            echo '   (' . $info['mime'] . ' - ' . $info[0] . ' x ' . $info[1] .' - ' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB)';
            echo '</p>';
            */
            $fields .= '&data[Photo][4][model]='.$_POST['model'].'&data[Photo][4][foreign_key]='.$_POST['foreign_key'].'&data[Photo][4][type]=4'.'&data[Photo][4][path]=http://1mtris.ingeniworks.com.my/schoolapps_upload/'.$dir_pics.'/'.$handle->file_dst_name;
             $photo_url[4] = array('url'=>'http://1mtris.ingeniworks.com.my/schoolapps_upload/'.$dir_pics.'/'.$handle->file_dst_name);
        } else {
            // one error occured
            echo '<p class="result">';
            echo '  <b>File not uploaded to the wanted location</b><br />';
            echo '  Error: ' . $handle->error . '';
            echo '</p>';
        }


          // we now process the image a second time, with some other settings
        $handle->image_resize            = true;
        $handle->image_ratio_crop        = true;
        $handle->image_x                 = 100;
        $handle->image_y                 = 100;
        
        
         //thumbnail 100 x 100
        $handle->Process($dir_dest);

        // we check if everything went OK
        if ($handle->processed) {
            // everything was fine !
            /*
            echo '<p class="result">';
            echo '  <b>File uploaded with success</b><br />';
            echo '  <img src="'.$dir_pics.'/' . $handle->file_dst_name . '" />';
            $info = getimagesize($handle->file_dst_pathname);
            echo '  File: <a href="'.$dir_pics.'/' . $handle->file_dst_name . '">' . $handle->file_dst_name . '</a><br/>';
            echo '   (' . $info['mime'] . ' - ' . $info[0] . ' x ' . $info[1] .' - ' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB)';
            echo '</p>';
            */
            $fields .= '&data[Photo][6][model]='.$_POST['model'].'&data[Photo][6][foreign_key]='.$_POST['foreign_key'].'&data[Photo][6][type]=6'.'&data[Photo][6][path]=http://1mtris.ingeniworks.com.my/schoolapps_upload/'.$dir_pics.'/'.$handle->file_dst_name;
             $photo_url[6] = array('url'=>'http://1mtris.ingeniworks.com.my/schoolapps_upload/'.$dir_pics.'/'.$handle->file_dst_name);
        } else {
            // one error occured
            echo '<p class="result">';
            echo '  <b>File not uploaded to the wanted location</b><br />';
            echo '  Error: ' . $handle->error . '';
            echo '</p>';
        }


        // we now process the image a second time, with some other settings
        $handle->image_resize            = true;
        $handle->image_ratio_crop        = true;
        $handle->image_x                 = 30;
        $handle->image_y                 = 30;
        
        
         //thumbnail 30 x 30
        $handle->Process($dir_dest);

        // we check if everything went OK
        if ($handle->processed) {
            // everything was fine !
            /*
            echo '<p class="result">';
            echo '  <b>File uploaded with success</b><br />';
            echo '  <img src="'.$dir_pics.'/' . $handle->file_dst_name . '" />';
            $info = getimagesize($handle->file_dst_pathname);
            echo '  File: <a href="'.$dir_pics.'/' . $handle->file_dst_name . '">' . $handle->file_dst_name . '</a><br/>';
            echo '   (' . $info['mime'] . ' - ' . $info[0] . ' x ' . $info[1] .' - ' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB)';
            echo '</p>';
            */
            $fields .= '&data[Photo][7][model]='.$_POST['model'].'&data[Photo][7][foreign_key]='.$_POST['foreign_key'].'&data[Photo][7][type]=7'.'&data[Photo][7][path]=http://1mtris.ingeniworks.com.my/schoolapps_upload/'.$dir_pics.'/'.$handle->file_dst_name;
             $photo_url[7] = array('url'=>'http://1mtris.ingeniworks.com.my/schoolapps_upload/'.$dir_pics.'/'.$handle->file_dst_name);
        } else {
            // one error occured
            echo '<p class="result">';
            echo '  <b>File not uploaded to the wanted location</b><br />';
            echo '  Error: ' . $handle->error . '';
            echo '</p>';
        }

          // we now process the image a second time, with some other settings
        $handle->image_resize            = true;
        $handle->image_ratio_crop        = true;
        $handle->image_x                 = 160;
        $handle->image_y                 = 160;

        $handle->Process($dir_dest);

        // we check if everything went OK
        if ($handle->processed) {
            // everything was fine !
            /*
            echo '<p class="result">';
            echo '  <b>File uploaded with success</b><br />';
            echo '  <img src="'.$dir_pics.'/' . $handle->file_dst_name . '" />';
            $info = getimagesize($handle->file_dst_pathname);
            echo '  File: <a href="'.$dir_pics.'/' . $handle->file_dst_name . '">' . $handle->file_dst_name . '</a><br/>';
            echo '   (' . $info['mime'] . ' - ' . $info[0] . ' x ' . $info[1] .' - ' . round(filesize($handle->file_dst_pathname)/256)/4 . 'KB)';
            echo '</p>';
            */
            $fields .= '&data[Photo][5][model]='.$_POST['model'].'&data[Photo][5][foreign_key]='.$_POST['foreign_key'].'&data[Photo][5][type]=5'.'&data[Photo][5][path]=http://1mtris.ingeniworks.com.my/schoolapps_upload/'.$dir_pics.'/'.$handle->file_dst_name;
             $photo_url[5] = array('url'=>'http://1mtris.ingeniworks.com.my/schoolapps_upload/'.$dir_pics.'/'.$handle->file_dst_name);
        } else {
            // one error occured
            echo '<p class="result">';
            echo '  <b>File not uploaded to the wanted location</b><br />';
            echo '  Error: ' . $handle->error . '';
            echo '</p>';
        }

        // we delete the temporary files
        $handle-> Clean();
        
        
        //extract data from the post
      //  extract($_POST);
        
        //set POST variables
        $url = 'http://1mtris.ingeniworks.com.my/schoolapps/photos/add';
        
        
        //url-ify the data for the POST
        //foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        //rtrim($fields_string, '&');
        
        //open connection
        $ch = curl_init($url);
        
        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_POST, 4);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
        
        //execute post
        $result = curl_exec($ch);
        if($result){
            echo json_encode($photo_url );
        }
        
        //close connection
        curl_close($ch);
        
        

    } else {
        // if we're here, the upload file failed for some reasons
        // i.e. the server didn't receive the file
        echo '<p class="result">';
        echo '  <b>File not uploaded on the server</b><br />';
        echo '  Error: ' . $handle->error . '';
        echo '</p>';
    }

}
?>
