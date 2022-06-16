<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ReportModel extends CI_Model
{

    public function getSuccessOrders()
    {
        $query = "SELECT DISTINCT O.id, O.orderdate, O.ordertime, O.status, ";
        $query .= "C.name AS cname, A.address, A.address2, A.address3, A.district, A.state, A.pincode, C.phone, C.email, ";
        $query .= "O.subtotal, O.shippingamount, O.billamount, O.status AS orderstatus, O.paymentreceived ";
        $query .= "FROM orders AS O, orderdetails AS OD, customers AS C , addresses AS A ";
        $query .= "WHERE O.id = OD.oid AND O.cid = C.id AND O.addressid = A.id ";
        $query .= "AND O.finalized = 'Yes' ";
        $query .= "ORDER BY O.id DESC";
        $data = $this->db->query($query);
        return $data->result();
    }

    public function getFailedOrders()
    {
        
        $query = "SELECT DISTINCT O.id, O.orderdate, O.ordertime, O.status, ";
        $query .= "C.name AS cname, A.address, A.address2, A.address3, A.district, A.state, A.pincode, C.phone, C.email, ";
        $query .= "O.subtotal, O.shippingamount, O.billamount, O.status AS orderstatus, O.paymentreceived ";
        $query .= "FROM orders AS O, orderdetails AS OD, customers AS C , addresses AS A ";
        $query .= "WHERE O.id = OD.oid AND O.cid = C.id AND O.addressid = A.id ";
        $query .= "AND O.finalized = 'no' ";
        $query .= "ORDER BY O.id DESC";
        $data = $this->db->query($query);
        return $data->result();
    }

    public function getProductOrders()
    {
        $query = "SELECT * FROM(SELECT P.id, P.name, IFNULL(SUM(OD.quantity), 0) AS ordercount, ";
        $query .= "varietyid, subscriptionmonths, ";
        $query .= "(SELECT name FROM productvarieties AS V WHERE V.id = varietyid) AS varietyname ";        
        $query .= "FROM products AS P INNER JOIN orderdetails AS OD ON P.id = OD.pid ";
        $query .= "AND OD.oid IN(SELECT O.id FROM orders AS O WHERE O.finalized = 'yes') ";
        $query .= "GROUP BY P.id, P.name) AS SRC ORDER BY ordercount DESC";
        $data = $this->db->query($query);
        return $data->result();
    }
    
}
