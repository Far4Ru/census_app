<?php

namespace App\Controller;

use App\Controller\AppController;

class AjaxController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadModel("Citizens");
    }

    public function ajaxAddCitizen(){

        if ($this->request->is('ajax')) {

            $citizen = $this->Citizens->newEmptyEntity();

            $citizen = $this->Citizens->patchEntity($citizen, $this->request->getData());
            if ($this->Citizens->save($citizen)) {

                $this->Flash->success(__('Информация добавлена'));

                echo json_encode(array(
                    "status" => 1,
                    "message" => "Citizen has been created"
                ));

                exit;
            }

            $this->Flash->error(__('Failed to save citizen data'));

            echo json_encode(array(
                "status" => 0,
                "message" => "Failed to create"
            ));

            exit;
        }
    }

    public function ajaxEditCitizen(){

        if ($this->request->is('ajax')) {

            $citizen = $this->Citizens->find('all')
                ->where(array('name' => $this->request->getData('name')))
                ->first();

            $citizen = $this->Citizens->patchEntity($citizen, $this->request->getData());

            if ($this->Citizens->save($citizen)) {

                $this->Flash->success(__('Информация обновлена'));

                echo json_encode(array(
                    "status" => 1,
                    "message" => "Citizen has been updated"
                ));

                exit;
            }

            $this->Flash->error(__('Не удалось обновить информацию'));

            echo json_encode(array(
                "status" => 0,
                "message" => "Failed to update citizen data"
            ));

            exit;
        }
    }

    public function ajaxDeleteCitizen()
    {
        if ($this->request->is('ajax')) {

            $citizen = $this->Citizens->get($this->request->getData("id"));

            if ($this->Citizens->delete($citizen)) {

                $this->Flash->success(__('Информация о жителе была удалена'));

                echo json_encode(array(
                    "status" => 1,
                    "message" => "The citizen has been deleted."
                ));

                exit;

            } else {
                $this->Flash->error(__('Не удалось удалить информацию о жителе. Пожалуйста, попробуйте снова'));

                echo json_encode(array(
                    "status" => 0,
                    "message" => "The citizen could not be deleted. Please, try again."
                ));

                exit;
            }
        }
    }
}
