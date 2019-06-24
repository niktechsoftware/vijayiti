<?php
/** APP: Ajax Image uploader with progress bar
    Website:packetcode.com
    Author: Krishna TEja G S
    Date: 29th April 2014
***/

// an array of allowed extensions
$allowedExts = array("gif", "jpeg", "jpg", "png","GIF","JPEG","JPG","PNG");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

//check if the file type is image and then extension
// store the files to upload folder
//echo '0' if there is an error
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    echo "0";
  } else {
    $target = "../../assets/images/empImage";
    $nm = time().$_FILES["file"]["name"];
    move_uploaded_file($_FILES["file"]["tmp_name"], $target. $nm);
    echo  base_url() ."/assets/images/empImage/". $nm;
    $empId = $_POST['empId'];
    $data = array(
    		"photo" => $nm
    );
    $this->db->where("emp_no",$empId);
    $this->db->update("employee_info",$data);
  }
} else {
  echo "0";
}