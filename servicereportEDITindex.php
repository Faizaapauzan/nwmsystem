<?php

include 'dbconnect.php';

$response = array('success' => false);

if(isset($_POST['jobregister_id']) && $_POST['jobregister_id']!='' || $_POST['jobregister_id']==''
    &&
   isset($_POST['date']) && $_POST['date']!='' || $_POST['date']==''
    &&
   isset($_POST['customer_name']) && $_POST['customer_name']!='' || $_POST['customer_name']==''
    &&
   isset($_POST['cust_phone1']) && $_POST['cust_phone1']!='' || $_POST['cust_phone1']==''
    &&
   isset($_POST['job_name']) && $_POST['job_name']!='' || $_POST['job_name']=='' 
    &&
   isset($_POST['job_assign']) && $_POST['job_assign']!='' || $_POST['job_assign']==''
    &&
     isset($_POST['assistants']) && $_POST['assistants']!='' || $_POST['assistants']==''
    &&
   isset($_POST['technician_arrival']) && $_POST['technician_arrival']!='' || $_POST['technician_arrival']==''
    &&
   isset($_POST['technician_leaving']) && $_POST['technician_leaving']!='' || $_POST['technician_leaving']==''
    &&
   isset($_POST['machine_name']) && $_POST['machine_name']!='' || $_POST['machine_name']==''
    &&
   isset($_POST['serialnumber']) && $_POST['serialnumber']!='' || $_POST['serialnumber']==''
    &&
   isset($_POST['srvcreportnumber']) && $_POST['srvcreportnumber']!='' || $_POST['srvcreportnumber']==''
    &&
   isset($_POST['Issue_By']) && $_POST['Issue_By']!='' || $_POST['Issue_By']=='' 
    &&
   isset($_POST['report']) && $_POST['report']!='' || $_POST['report']==''
    &&
   isset($_POST['cust']) && $_POST['cust']!='' || $_POST['cust']==''
    &&
   isset($_POST['custphone']) && $_POST['custphone']!='' || $_POST['custphone']==''
    &&
   isset($_POST['technician_departure']) && $_POST['technician_departure']!='' || $_POST['technician_departure']=='' 
    &&
   isset($_POST['Submitted_Items']) && $_POST['Submitted_Items']!='' || $_POST['Submitted_Items']==''
    &&
   isset($_POST['Problem_Description']) && $_POST['Problem_Description']!='' || $_POST['Problem_Description']=='')

    {
        
        $sql = "UPDATE servicereport SET
                       date ='".addslashes($_POST['date'])."',
                       customer_name ='".addslashes($_POST['customer_name'])."',
                       cust_phone1 ='".addslashes($_POST['cust_phone1'])."',
                       job_name ='".addslashes($_POST['job_name'])."',
                       job_assign ='".addslashes($_POST['job_assign'])."',
                       assistants ='".addslashes($_POST['assistants'])."',
                       technician_arrival ='".addslashes($_POST['technician_arrival'])."',
                       technician_leaving ='".addslashes($_POST['technician_leaving'])."',
                       machine_name ='".addslashes($_POST['machine_name'])."',
                       serialnumber ='".addslashes($_POST['serialnumber'])."',
                       srvcreportnumber ='".addslashes($_POST['srvcreportnumber'])."',
                       Issue_By ='".addslashes($_POST['Issue_By'])."',
                       report ='".addslashes($_POST['report'])."',
                       cust ='".addslashes($_POST['cust'])."',
                       custphone ='".addslashes($_POST['custphone'])."',
                       technician_departure ='".addslashes($_POST['technician_departure'])."',
                       Submitted_Items ='".addslashes($_POST['Submitted_Items'])."',
                       Problem_Description ='".addslashes($_POST['Problem_Description'])."'
                WHERE  jobregister_id ='".addslashes($_POST['jobregister_id'])."' ";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>