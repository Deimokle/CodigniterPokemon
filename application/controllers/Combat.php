<?php

class Combat extends CI_Controller
{
    public function form()
    {
        $this->load->model('combat_model');
        $this->load->model('pokemon_model');

        $pokemons = $this->pokemon_model->get_all();
        $data['pokemons'] = $pokemons;

        $data['title'] = 'combats';
        $data['same'] = '';

        $this->form_validation->set_rules('pok1_id', 'Pokemon 1', 'required|trim');
        $this->form_validation->set_rules('pok2_id', 'Pokemon 2', 'required|trim');

        if ($this->form_validation->run() !== FALSE)
        {
            $pok1_id = $this->pokemon_model->get($this->input->post('pok1_id'));
            $pok2_id = $this->pokemon_model->get($this->input->post('pok2_id'));

            //var_dump($pok2_id);die;

            $nbcoup1 = $pok2_id->vie / $pok1_id->combat;
            $nbcoup2 = $pok1_id->vie / $pok2_id->combat;
            if ($pok1_id == $pok2_id) {
                $data['same'] = 'Le pokemon ne peut pas faire de combat contre lui meme !!';
            }
            else {
               if ($nbcoup1 < $nbcoup2) {
                $postdata["win"] = $pok1_id->nom;
                }
                elseif ($nbcoup1 > $nbcoup2) {
                    $postdata["win"] = $pok2_id->nom;
                }
                else {
                    $postdata["win"] = 'match null';
                }

                $date_now = new DateTime("now");

                $postdata["date"] = $date_now->format('Y-m-d H:i:s');
                $postdata["pok1_id"] = $this->input->post('pok1_id');
                $postdata["pok2_id"] = $this->input->post('pok2_id');
                
                $this->combat_model->insert($postdata);
            }
        }
        
        $combats = $this->combat_model->get_all();
        $data['combats'] = $combats;

        $this->load->view('templates/head');
        $this->load->view('combat/combat_form_view', $data);
        $this->load->view('templates/foot');
    }
}