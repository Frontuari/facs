<?php
$this->load->view("admin/templates/frontend/header");
$this->load->view("admin/templates/frontend/sidebar");
$this->load->view("admin/templates/frontend/main");
$this->load->view("admin/".(isset($path) ? $path."/".$content : $content));
$this->load->view("admin/templates/frontend/footer");