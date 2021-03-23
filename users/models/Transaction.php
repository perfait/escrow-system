<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}   //for variable reusage

  class Transaction {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function addTransaction($data) {
      // Prepare Query
      $this->db->query('INSERT INTO transactions (id, customer_id, customer_email, product, transaction_title, transaction_partner, amount, currency) VALUES(:id, :customer_id, :email, :product, :transaction_title, :transaction_partner, :amount, :currency)');

      // Bind Values

      $mytransid = uniqid('transid_'); 

      $this->db->bind(':id', $mytransid);
      $this->db->bind(':customer_id',  $_SESSION['myuid']);
      $this->db->bind(':email', $_POST['email']);
      $this->db->bind(':product', $data['product']);
      $this->db->bind(':transaction_title', $_POST['transaction_title']);
      $this->db->bind(':transaction_partner', $_POST['seller_email']);
      $this->db->bind(':amount', $data['amount']);
      $this->db->bind(':currency', $data['currency']);
  

      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

    public function getTransactions() {
      $this->db->query('SELECT * FROM transactions ORDER BY created_at DESC');

      $results = $this->db->resultset();

      return $results;
    }
  }