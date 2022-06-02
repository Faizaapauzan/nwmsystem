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
   isset($_POST['technician_arrival']) && $_POST['technician_arrival']!='' || $_POST['technician_arrival']==''
    &&
   isset($_POST['technician_leaving']) && $_POST['technician_leaving']!='' || $_POST['technician_leaving']==''
    &&
   isset($_POST['machine_name']) && $_POST['machine_name']!='' || $_POST['machine_name']==''
    &&
   isset($_POST['serialnumber']) && $_POST['serialnumber']!='' || $_POST['serialnumber']==''
    &&
   isset($_POST['srvcreportnumber']) && $_POST['srvcreportnumber']!=''
    &&
   isset($_POST['Issue_By']) && $_POST['Issue_By']!='' || $_POST['Issue_By']==''
    &&
   isset($_POST['report']) && $_POST['report']!='' || $_POST['report']==''
    &&
   isset($_POST['cust']) && $_POST['cust']!='' || $_POST['cust']==''
    &&
   isset($_POST['custphone']) && $_POST['custphone']!='' || $_POST['custphone']==''
    &&
   isset($_POST['Travel_Time']) && $_POST['Travel_Time']!='' || $_POST['Travel_Time']==''
    &&
   isset($_POST['Submitted_Items']) && $_POST['Submitted_Items']!='' || $_POST['Submitted_Items']==''
    &&
   isset($_POST['Problem_Description']) && $_POST['Problem_Description']!='' || $_POST['Problem_Description']=='')

    {
        
        $sql = "INSERT INTO servicereport ( jobregister_id, date, customer_name, cust_phone1, job_name, job_assign, technician_arrival, technician_leaving, machine_name, serialnumber,
                                           srvcreportnumber, Issue_By, report, cust, custphone, Travel_Time, Submitted_Items, Problem_Description) 
                       
                       VALUES ('".addslashes($_POST['jobregister_id'])."',
                               '".addslashes($_POST['date'])."',
                               '".addslashes($_POST['customer_name'])."',
                               '".addslashes($_POST['cust_phone1'])."',
                               '".addslashes($_POST['job_name'])."',
                               '".addslashes($_POST['job_assign'])."',
                               '".addslashes($_POST['technician_arrival'])."',
                               '".addslashes($_POST['technician_leaving'])."',
                               '".addslashes($_POST['machine_name'])."',
                               '".addslashes($_POST['serialnumber'])."',
                               '".addslashes($_POST['srvcreportnumber'])."',
                               '".addslashes($_POST['Issue_By'])."',
                               '".addslashes($_POST['report'])."',
                               '".addslashes($_POST['cust'])."',
                               '".addslashes($_POST['custphone'])."',
                               '".addslashes($_POST['Travel_Time'])."',
                               '".addslashes($_POST['Submitted_Items'])."',
                               '".addslashes($_POST['Problem_Description'])."')";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>