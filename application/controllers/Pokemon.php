<?php

class Pokemon extends CI_Controller
{
    public function form()
    {
        $this->load->model('pokemon_model');

        $pokemons = $this->pokemon_model->get_all();
        $data['pokemons'] = $pokemons;

        $data['title'] = 'Pokedex';

        $this->form_validation->set_rules('nom', 'Nom', 'required|trim');
        $this->form_validation->set_rules('vie', 'Vie', 'required|trim');
        $this->form_validation->set_rules('exp', 'Experience', 'required|trim');
        $this->form_validation->set_rules('combat', 'Combat', 'required|trim');
        $this->form_validation->set_rules('cat', 'Categorie', 'required|trim');

        if ($this->form_validation->run() !== FALSE)
        {
            $date_now = new DateTime("now");

            $postdata["dte"] = $date_now->format('Y-m-d H:i:s');
            $postdata["nom"] = $this->input->post('nom');
            $postdata["vie"] = $this->input->post('vie');
            $postdata["exp"] = $this->input->post('exp');
            $postdata["combat"] = $this->input->post('combat');
            $postdata["cat"] = $this->input->post('cat');

            if ($file = $this->_filepok("photo"))
            {
                $postdata["photo"] = $file["file_name"];
            }

            $this->pokemon_model->insert($postdata);
        }

        

        $this->load->view('templates/head');
        $this->load->view('pokemon/pokemon_liste_new_view', $data);
        $this->load->view('templates/foot');
    }

    public function voir($pokemon_id)
    {
        $this->load->model('pokemon_model');
        $this->load->model('commentaire_model');

        
        $pok = $this->pokemon_model->get(array('id' => $pokemon_id));
        $commentaires = $this->commentaire_model->get_many_by(array('pokemon_id' => $pokemon_id));
        
        if (!$pok){
            show_404();
        }

        $this->form_validation->set_rules('titre', 'Titre', 'required|trim');
        $this->form_validation->set_rules('texte', 'texte', 'required|trim');

        if ($this->form_validation->run() !== FALSE)
        {
             $postdata["titre"] = $this->input->post('titre');
             $postdata["texte"] = $this->input->post('texte');
             $postdata["pokemon_id"] = $pokemon_id;
             $this->commentaire_model->insert($postdata);
        }

        $data['pok'] = $pok;
        $data['commentaires'] = $commentaires;


        //var_dump($pokemon); die;
        $this->load->view('templates/head');
        $this->load->view('pokemon/pokemon_show_view', $data);
        $this->load->view('templates/foot');
    }

    public function del($pokemon_id)
    {
        $this->load->model('pokemon_model');

        $pokemon = $this->pokemon_model->get_by(array('id' => $pokemon_id));

        if (!$pokemon)
            show_404();

        $this->pokemon_model->delete($pokemon_id);
        redirect('pokemon/form');
    }

    public function _filepok($file)
    {
        if ($_FILES[$file]['name']!= "") {

            $this->load->helper("text");
            $filename = convert_accented_characters($_FILES[$file]['name']);

            $config['file_name'] = url_title($filename, "_",true);
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file))
            {
                die($this->upload->display_errors());
            }
            else
            {
                return $this->upload->data();
            }
        }
        return false;
        
    }


}