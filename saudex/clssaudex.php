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
        try {
            $sql = "insert into usuarios (Nome, Senha, Email, Telefone, cpf, cep, nasc, genero) values (:Nome, :Senha, :Email, :Telefone, :cpf, :cep, :nasc, :genero)";
            $Comando = $this->conn->prepare($sql);
            $Comando->bindParam(':Nome', $this->Nome);
            $Comando->bindParam(':Senha', $this->Senha);
            $Comando->bindParam(':Email', $this->Email);
            $Comando->bindParam(':Telefone', $this->Telefone);
            $Comando->bindParam(':cpf', $this->cpf);
            $Comando->bindParam(':cep', $this->cep);
            $Comando->bindParam(':nasc', $this->nasc);
            $Comando->bindParam(':genero', $this->genero);
            $Comando->execute();
            
            if ($Comando->rowCount() > 0) {
                return json_encode(['status' => 'sucesso', 'msg' => 'Inclusao com sucesso!']);
            } else {
                return json_encode(['status' => 'erro', 'msg' => 'Erro ao tentar efetivar cadastro']);
            }
        } catch (PDOException $erro) { 
            return json_encode(['status' => 'erro', 'msg' => "Erro de Processo: " . $erro->getMessage()]);
        } 
    }

    // -- metodo exclusao  --------------------------------------------
    public function Excluir($cod) 
    {
        try {
            $Comando = $this->conn->prepare("delete from usuarios where cod = :cod");
            $Comando->bindParam(':cod', $cod);
            $Comando->execute();
        
            if ($Comando->rowCount() > 0) { 
                return json_encode(['status' => 'sucesso', 'msg' => "Exclusao com sucesso!"]);
            } else { 
                return json_encode(['status' => 'erro', 'msg' => "Nenhum usuário encontrado com o código fornecido."]);
            }
        } catch (PDOException $erro) { 
            return json_encode(['status' => 'erro', 'msg' => "Erro de Processo: ". $erro->getMessage()]);
        }
    }

    // -- metodo alteracao  --------------------------------------------
    public function Editar() 
    {
        try {
            $sql = "UPDATE usuarios SET Nome = :Nome, Email = :Email, Telefone = :Telefone, cep = :cep, cpf = :cpf, nasc = :nasc, genero = :genero";
            if (!empty($this->Senha)) {
                $sql .= ", Senha = :Senha";
            }
            $sql .= " WHERE cod = :cod";
            
            $Comando = $this->conn->prepare($sql);
            $Comando->bindParam(':cod', $this->cod);
            $Comando->bindParam(':Nome', $this->Nome);
            $Comando->bindParam(':Email', $this->Email);
            $Comando->bindParam(':Telefone', $this->Telefone);
            $Comando->bindParam(':cep', $this->cep);
            $Comando->bindParam(':cpf', $this->cpf);
            $Comando->bindParam(':nasc', $this->nasc);
            $Comando->bindParam(':genero', $this->genero);
            
            if (!empty($this->Senha)) {
                 $Comando->bindParam(':Senha', $this->Senha);
            }
            
            $Comando->execute();
        
            if ($Comando->rowCount() > 0) { 
                return json_encode(['status' => 'sucesso', 'msg' => "Alteração com sucesso!"]);
            } else { 
                return json_encode(['status' => 'erro', 'msg' => "Nenhuma alteração foi feita."]);
            }
        } catch (PDOException $erro) {
            return json_encode(['status' => 'erro', 'msg' => "Erro de Processo: ". $erro->getMessage()]);
        }
    }

    // -- metodo pesquisa  --------------------------------------------
    public function Pesquisar($codFiltro, $NomeFiltro)
    {
        try {
            if ($codFiltro) {
                $Matriz = $this->conn->prepare("SELECT cod, Nome, Email, Telefone, cpf, cep, nasc, genero, role FROM usuarios WHERE cod = :cod");
                $Matriz->bindParam(':cod', $codFiltro);
            } else {
                $Matriz = $this->conn->prepare("SELECT cod, Nome, Email, Telefone, cpf, cep, nasc, genero, role FROM usuarios WHERE Nome LIKE :Nome");
                $NomeFiltro = '%' . $NomeFiltro . '%'; 
                $Matriz->bindParam(':Nome', $NomeFiltro);
            }
            $Matriz->execute();
            $usuarios = $Matriz->fetchAll(PDO::FETCH_ASSOC); 
            return json_encode($usuarios);
        } catch (Exception $erro) {
            return json_encode(['status' => 'erro', 'msg' => "Erro de Processo: ". $erro->getMessage()]);        
        }
    }

    // -- metodo promover admin  --------------------------------------------
    public function PromoverAdmin($cod)
    {
        try {
            $sql = "UPDATE usuarios SET role = 'admin' WHERE cod = :cod";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cod', $cod);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                return json_encode(["status" => "sucesso", "msg" => "Usuário promovido a administrador."]);
            } else {
                return json_encode(["status" => "erro", "msg" => "Nenhuma alteração foi feita. Usuário já é admin ou não existe."]);
            }
        } catch (PDOException $erro) {
            return json_encode(["status" => "erro", "msg" => "Erro ao promover usuário: " . $erro->getMessage()]);
        }
    }
    
    // -- metodo rebaixar admin  --------------------------------------------
    public function RebaixarUser($cod)
    {
        try {
            $sql = "UPDATE usuarios SET role = 'user' WHERE cod = :cod";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':cod', $cod);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                return json_encode(["status" => "sucesso", "msg" => "Usuário rebaixado para usuário comum."]);
            } else {
                return json_encode(["status" => "erro", "msg" => "Nenhuma alteração foi feita. Usuário já é comum ou não existe."]);
            }
        } catch (PDOException $erro) {
            return json_encode(["status" => "erro", "msg" => "Erro ao rebaixar usuário: " . $erro->getMessage()]);
        }
    }

    // -- metodo login  --------------------------------------------
    public function Login($Email, $Senha)
    {
        try {
            $sql = "SELECT cod, Nome, Email, Senha, role FROM usuarios WHERE Email = :Email";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':Email', $Email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            
                if (password_verify($Senha, $usuario['Senha'])) {
                    unset($usuario['Senha']);
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