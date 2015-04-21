<?php
class my404 extends CI_Controller
{
	public function __construct()
	{
	        parent::__construct();
	}

	public function index()
	{
		$this->output->set_status_header('404');
		$data['page_title'] = 'Seite nicht gefunden'; // View name
		 			$e = "<span class='request-not-found'>Die gewünschte Seite wurde nicht gefunden.</span>";
					 $e .="<p>Wahrscheinlich haben Sie einen abgelaufenen Link angeklickt, deren Seite nicht mehr verfügbar ist.</p>";
					 $e .="<ul class='not-found'>";
					 $e .="<li><a style='color:red;' href='".$this->config->item('base_url')."'>Zur Startseite</a></li>";
					 $e .="</ul>";
						$data['msg'] = $e; // View name
		$this->load->view('my404',$data);//loading in my template
	}
}
?>