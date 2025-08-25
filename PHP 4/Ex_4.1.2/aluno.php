  <?php

    class aluno {
        public $nome;
        public $matricula;
        public $curso;
        public $nascimento;

        public function __construct($nome, $matricula, $curso, $nascimento) {
            $this->nome = $nome;
            $this->matricula = $matricula;
            $this->curso = $curso;
            $this->nascimento = $nascimento;
        }

        public function calcularIdade() {
            if (empty($this->nascimento)) {
                return "Não informada";
            }
            $dataNascimento = new DateTime($this->nascimento);
            $hoje = new DateTime('now');
            $diferenca = $hoje->diff($dataNascimento);
            return $diferenca->y;
        }
    }


  ?>