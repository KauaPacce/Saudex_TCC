<?php

include_once 'conexao.php';

class clssaudex
{
    private $conn;
	private $cod, $Nome, $Email, $Senha, $Telefone, $cpf, $cep, $nasc, $genero;

    // -- contrutor conexao ---------------
    public function __construct() 
    {
        $conexao = new Conexao();
        $this->conn = $conexao->getConnection();
    }

    // -- Atributos cod ----------------
    public function setcod($cd)
        { $this->cod = $cd; }
    public function getcod()
        { return $this->cod; }

    // -- Atributos Nome ----------------
    public function setNome($Nm)
        { $this->Nome = $Nm; }
    public function getNome()
        { return $this->Nome; }

    // -- Atributos Email ----------------
    public function setEmail($Em)
        { $this->Email = $Em; }
    public function getEmail()
        { return $this->Email; }

    public function setSenha($Se)
        { $this->Senha = $Se; }
    public function getSenha()
        { return $this->Senha; }    

    // -- Atributos Telefone ----------------
    public function setTelefone($Tf)
        { $this->Telefone = $Tf; }
    public function getTelefone()
        { return $this->Telefone; }
    
    // -- Atributos cep ----------------
    public function setcep($cp)
        { $this->cep = $cp; }
    public function getcep()
        { return $this->cep; } 

    // -- Atributos cpf ----------------
    public function setcpf($cf)
        { $this->cpf = $cf; }
    public function getcpf()
        { return $this->cpf; }
        
    // -- Atributos nasc ----------------
    public function setnasc($nc)
        { $this->nasc = $nc; }
    public function getnasc()
        { return $this->nasc; } 

     // -- Atributos genero ----------------
    public function setgenero($gn)
     { $this->genero = $gn; }
    public function getgenero()
     { return $this->genero; }

	// -- metodo gravacao --------------------------------------------
    public function Cadastrar() 
    {
        try 
        {
            // criar o comando
            $sql = "insert into usuarios (cod,Nome,Senha,Email,Telefone,cpf,cep,nasc,genero) values (:cod, :Nome, :Senha, :Email, :Telefone, :cpf, :cep, :nasc, :genero)";

            
            $Comando=$this->conn->prepare($sql);
            $Comando->bindParam(':cod', $this->cod);
            $Comando->bindParam(':Nome', $this->Nome);
            $Comando->bindParam(':Senha', $this->Senha); 
            $Comando->bindParam(':Email', $this->Email);
            $Comando->bindParam(':Telefone', $this->Telefone);
            $Comando->bindParam(':cpf', $this->cpf);
            $Comando->bindParam(':cep', $this->cep);
            $Comando->bindParam(':nasc', $this->nasc);
            $Comando->bindParam(':genero', $this->genero);

            // executa o comando
            $Comando->execute();
        
            if ($Comando->rowCount() > 0)
            { $RetornoMsg = "Inclusao com sucesso!"; } 
            else 
            { $RetornoMsg = "Erro ao tentar efetivar cadastro"; }
        }    
        catch (PDOException $erro) 
        { 
            $RetornoMsg = "Erro de Processo: " . $erro->getMessage(); 
        } 

        echo $RetornoMsg;
    }

    // -- metodo exclusao --------------------------------------------    
    public function Excluir() 
    {
        try 
        {
            $Comando = $this->conn->prepare("delete from usuarios where cod = :cod");
            $Comando->bindParam(':cod', $this->cod);
            
            $Comando->execute();
        
            if ($Comando->rowCount() > 0)
            { $RetornoMsg = "Exclusao com sucesso!"; } 
            else 
            { $RetornoMsg = "Erro ao executar o comando SQL"; }
        } 
        catch (PDOException $erro) 
        { 
            $RetornoMsg = "Erro de Processo: ". $erro->getMessage(); 
        }

        echo $RetornoMsg;
    }

    // -- metodo alteracao --------------------------------------------    
    public function Editar() 
    {
        try 
        {
            $Comando = $this->conn->prepare("update usuarios set cod=:cod,Nome=:Nome,Senha=:Senha,Email=:Email,Telefone=:Telefone,cpf=:cpf,cep=:cep,nasc=:nasc,genero=:genero where cod = :cod ");
            $Comando->bindParam(':cod', $this->cod);
            $Comando->bindParam(':Nome', $this->Nome);
            $Comando->bindParam(':Senha', $this->Senha);
            $Comando->bindParam(':Email', $this->Email);
            $Comando->bindParam(':Telefone', $this->Telefone);
            $Comando->bindParam(':cep', $this->cep);
            $Comando->bindParam(':cpf', $this->cpf);
            $Comando->bindParam(':nasc', $this->nasc);
            $Comando->bindParam(':genero', $this->genero);
            
            $Comando->execute();
        
            if ($Comando->rowCount() > 0)
            { $RetornoMsg = "Alteração com sucesso!"; } 
            else 
            { $RetornoMsg = "Erro ao executar o comando SQL"; }
        } 
        catch (PDOException $erro) 
        {
            $RetornoMsg = "Erro de Processo: ". $erro->getMessage();
        }

        echo $RetornoMsg;
    }

    // -- metodo pesquisar  --------------------------------------------
    public function Pesquisar() 
    {
        try 
        {
            if ($this->cod == '' && $this->Nome == '')
            {
                $Matriz = $this->conn->prepare("select cod, Nome, Senha, Email, Telefone, cpf, cep, nasc, genero from usuarios");
            }
            elseif ($this->cod != '')
            {
                $Matriz = $this->conn->prepare("select cod, Nome, Senha, Email, Telefone, cpf, cep, nasc, genero from usuarios where cod = :cod");
                $Matriz->bindParam(':cod', $this->cod); 
            }
            elseif ($this->Nome != '')
            {
                $NomeFiltro = '%' . $this->Nome . '%';
                $Matriz = $this->conn->prepare("select cod, Nome, Senha, Email, Telefone, cpf, cep, nasc, genero from usuarios where Nome like '%". $NomeFiltro ."%' ");
            }

            // executar
            $Matriz->execute();

            // transformar em array
            $usuarios = $Matriz->fetchAll(); 

            // converter
            $RetornoJSON = json_encode($usuarios);
        } 
        catch (Exception $erro) 
        {
            $RetornoJSON = "Erro de Processo: ". $erro->getMessage();        
        }

        echo $RetornoJSON;
    }

        public function Login($Email, $Senha) 
{
    try {
        $sql = "SELECT cod, Nome, Email, Senha FROM usuarios WHERE Email = :Email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':Email', $Email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (password_verify($Senha, $usuario['Senha'])) {
                unset($usuario['Senha']); // isso aqui é pra n retornar a senha
                return json_encode([
                    "status" => "sucesso",
                    "msg" => "Login efetuado!",
                    "usuario" => $usuario
                ]);
            } else {
                return json_encode(["status" => "erro", "msg" => "Senha incorreta"]);
            }
        } else {
            return json_encode(["status" => "erro", "msg" => "Email não encontrado"]);
        }
    } catch (PDOException $erro) {
        return json_encode(["status" => "erro", "msg" => $erro->getMessage()]);
    }
}
}