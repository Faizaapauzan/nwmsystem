<?php
    
    include 'dbconnect.php';
    
    $response = array('success' => false);
    
    if  (isset($_POST['today_date']) && $_POST['today_date']!='' || $_POST['today_date']==''
            &&
         isset($_POST['job_code']) && $_POST['job_code']!='' || $_POST['job_code']==''
            &&
         isset($_POST['job_name']) && $_POST['job_name']!='' || $_POST['job_name']==''
            &&
         isset($_POST['job_order_number']) && $_POST['job_order_number']!='' || $_POST['job_order_number']==''
            &&
         isset($_POST['job_description']) && $_POST['job_description']!='' || $_POST['job_description']==''
            &&
         isset($_POST['technician_rank']) && $_POST['technician_rank']!='' || $_POST['technician_rank']==''
            &&
         isset($_POST['staff_position']) && $_POST['staff_position']!='' || $_POST['staff_position']==''
            &&
         isset($_POST['job_cancel']) && $_POST['job_cancel']!='' || $_POST['job_cancel']==''
            &&
         isset($_POST['support']) && $_POST['support']!='' || $_POST['support']==''
            &&
         isset($_POST['reason']) && $_POST['reason']!='' || $_POST['reason']==''
            &&
         isset($_POST['customer_code']) && $_POST['customer_code']!='' || $_POST['customer_code']==''
            &&
         isset($_POST['customer_name']) && $_POST['customer_name']!='' || $_POST['customer_name']==''
            &&
         isset($_POST['customer_grade']) && $_POST['customer_grade']!='' || $_POST['customer_grade']==''
            &&
         isset($_POST['job_priority']) && $_POST['job_priority']!='' || $_POST['job_priority']==''
            &&
         isset($_POST['requested_date']) && $_POST['requested_date']!='' || $_POST['requested_date']==''
            &&
         isset($_POST['delivery_date']) && $_POST['delivery_date']!='' || $_POST['delivery_date']==''
            &&
         isset($_POST['customer_PIC']) && $_POST['customer_PIC']!='' || $_POST['customer_PIC']==''
            &&
         isset($_POST['cust_phone1']) && $_POST['cust_phone1']!='' || $_POST['cust_phone1']==''
            &&
         isset($_POST['cust_phone2']) && $_POST['cust_phone2']!='' || $_POST['cust_phone2']==''
            &&
         isset($_POST['cust_address1']) && $_POST['cust_address1']!='' || $_POST['cust_address1']==''
            &&
         isset($_POST['cust_address2']) && $_POST['cust_address2']!='' || $_POST['cust_address2']==''
            &&
         isset($_POST['cust_address3']) && $_POST['cust_address3']!='' || $_POST['cust_address3']==''
            &&
         isset($_POST['machine_id']) && $_POST['machine_id']!='' || $_POST['machine_id']==''
            &&
         isset($_POST['machine_code']) && $_POST['machine_code']!='' || $_POST['machine_code']==''
            &&
         isset($_POST['machine_name']) && $_POST['machine_name']!='' || $_POST['machine_name']==''
            &&
         isset($_POST['machine_type']) && $_POST['machine_type']!='' || $_POST['machine_type']==''
            &&
         isset($_POST['type_id']) && $_POST['type_id']!='' || $_POST['type_id']==''
            &&
         isset($_POST['machine_brand']) && $_POST['machine_brand']!='' || $_POST['machine_brand']==''
            &&
         isset($_POST['brand_id']) && $_POST['brand_id']!='' || $_POST['brand_id']==''
            &&
         isset($_POST['serialnumber']) && $_POST['serialnumber']!='' || $_POST['serialnumber']==''
            &&
         isset($_POST['accessories_required']) && $_POST['accessories_required']!='' || $_POST['accessories_required']==''
            &&
         isset($_POST['jobregistercreated_by']) && $_POST['jobregistercreated_by']!='' || $_POST['jobregistercreated_by']==''
            &&
         isset($_POST['jobregisterlastmodify_by']) && $_POST['jobregisterlastmodify_by']!='' || $_POST['jobregisterlastmodify_by']=='')

    {
        $machine_id = !empty($machine_id) ? "'$machine_id'" : "NULL";
        $type_id = !empty($type_id) ? "'$type_id'" : "NULL";
        $brand_id = !empty($brand_id) ? "'$brand_id'" : "NULL";
       
        $sql = "INSERT INTO job_register (today_date, job_code, job_name, job_order_number, job_description,
                                          technician_rank, staff_position, job_cancel, support,
                                          reason, customer_code, customer_name, customer_grade,
                                          job_priority, requested_date, delivery_date, customer_PIC, cust_phone1,
                                          cust_phone2, cust_address1, cust_address2, cust_address3, machine_id,
                                          machine_code, machine_name, machine_type, type_id, machine_brand,
                                          brand_id, serialnumber, accessories_required, jobregistercreated_by, jobregisterlastmodify_by) 
                       
                       VALUES ('".addslashes($_POST['today_date'])."',
                               '".addslashes($_POST['job_code'])."',
                               '".addslashes($_POST['job_name'])."',
                               '".addslashes($_POST['job_order_number'])."',
                               '".addslashes($_POST['job_description'])."',
                               '".addslashes($_POST['technician_rank'])."',
                               '".addslashes($_POST['staff_position'])."',
                               '".addslashes($_POST['job_cancel'])."',
                               '".addslashes($_POST['support'])."',
                               '".addslashes($_POST['reason'])."',
                               '".addslashes($_POST['customer_code'])."',
                               '".addslashes($_POST['customer_name'])."',
                               '".addslashes($_POST['customer_grade'])."',
                               '".addslashes($_POST['job_priority'])."',
                               '".addslashes($_POST['requested_date'])."',
                               '".addslashes($_POST['delivery_date'])."',
                               '".addslashes($_POST['customer_PIC'])."',
                               '".addslashes($_POST['cust_phone1'])."',
                               '".addslashes($_POST['cust_phone2'])."',
                               '".addslashes($_POST['cust_address1'])."',
                               '".addslashes($_POST['cust_address2'])."',
                               '".addslashes($_POST['cust_address3'])."',
                               $machine_id,
                               '".addslashes($_POST['machine_code'])."',
                               '".addslashes($_POST['machine_name'])."',
                               '".addslashes($_POST['machine_type'])."',
                               $type_id,
                               '".addslashes($_POST['machine_brand'])."',
                               $brand_id,
                               '".addslashes($_POST['serialnumber'])."',
                               '".addslashes($_POST['accessories_required'])."',
                               '".addslashes($_POST['jobregistercreated_by'])."',
                               '".addslashes($_POST['jobregisterlastmodify_by'])."')";
        
        if($conn->query($sql))
        {
            $response['success'] = true;
        }
    }

echo json_encode($response);

?>