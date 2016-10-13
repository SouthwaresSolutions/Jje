<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexController extends CI_Controller {
	public function index()
	{
		$data['ufList'] = $this->StateModel->getAll();
		$this->load->view('index/index', $data);
	}
	/*
	public function indexPost(){

		//Campos referente a NFE
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');

		//Campos referente a Destinatário -> Identificação
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');

		//Campos referente a Destinatário -> Endereço
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');

		//Campos referente a Dados do produto
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');
		$this->form_validation->set_rules('nomeCampoInput', 'nomeNaMensagemDeErro', 'trim|required');

		if ($this->form_validation->run()) {

			$signedXml = $this->NfeModel->signXml($this->NfeModel->createXml($this->input->post('xml')));

			if($this->NfeModel->isSignatureValid($signedXml)){

				$this->NfeModel->sendLote($signedXml);
			}
		}else{
			header("refresh: 0;");
		}
	}
	*/
}
