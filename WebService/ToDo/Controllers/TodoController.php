<?php

    namespace Controllers;

    use Core\Controller;
    use Models\Tarefa;

    class TodoController extends Controller
    {
        public function index()
        {

        }

        public function listar()
        {
            $tarefas = [];

            $tarefa = new Tarefa();
            $tarefas = $tarefa->listar();

            header('Content-Type: application/json');
            echo json_encode($tarefas);
        }

        public function adicionar()
        {
            if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
                $titulo = addslashes($_POST['titulo']);

                $tarefa = new Tarefa();
                $tarefa->adicionarTarefa($titulo);
            }
        }

        public function atualizar()
        {
            global $_PUT;

            if (isset($_PUT['id']) && !empty($_PUT['id'])) {
                $id = addslashes($_PUT['id']);
                $status = addslashes($_PUT['status']);

                $tarefa = new Tarefa();
                $tarefa->atualizarStatus($status, $id);
            }
        }

        public function deletar()
        {
            global $_DELETE;
            
            if (isset($_DELETE['id']) && !empty($_DELETE['id'])) {
                $id = addslashes($_DELETE['id']);

                $tarefa = new Tarefa();
                $tarefa->deletarTarefa($id);
            }
        }
    }
