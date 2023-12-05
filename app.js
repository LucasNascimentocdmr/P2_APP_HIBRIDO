require("dotenv").config();
const express = require("express");
const mongoose = require("mongoose");
const bcrypt = require("bcrypt");
const jwt = require("jsonwebtoken");
const swaggerJSDoc = require("swagger-jsdoc");
const swaggerUi = require("swagger-ui-express");
const path = require("path");
const fs = require("fs");
const mysql = require("mysql2");
const bodyParser = require("body-parser");

const secretKey = "bondedotigrao@@";

const app = express();

const User = require("./models/User");

app.use(express.static(path.join(__dirname, "frontend")));
app.use(express.json());

// Importe as rotas do Swagger
const swaggerRoutes = require("./routes/swagger");
app.use("/api-docs", swaggerRoutes);

/**
 @swagger
 * /:
 *   get:
 *     summary: Retorna uma mensagem de boas-vindas
 *     responses:
 *       200:
 *         description: Mensagem de boas-vindas
 */
app.get("/", (req, res) => {
  res.status(200).json({ msg: "Bem-vindo! Faltam rotas de acesso!!!!!" });
});

const db = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "carga",
});

db.connect((err) => {
  if (err) {
    console.error("Erro ao conectar ao banco de dados:", err);
  } else {
    console.log("Conectado ao banco de dados com sucesso");
  }
});


app.get("/dados", (req, res) => {
  const consulta = "SELECT * FROM carga";

  connection.query(consulta, (err, result) => {
    if (err) {
      console.error("Erro na consulta ao banco de dados:", err);
      res.status(500).json({ error: "Erro interno do servidor" });
      return;
    }

    res.json(result);
  });
});

app.use(bodyParser.urlencoded({ extended: true }));


app.get("/carga_one", (req, res) => {
  res.sendFile(path.join(__dirname, "frontend", "carga_one.php"));
  res.type("text/html");
});



app.post("/carga_one", (req, res) => {
  
  const {
    RECEBIDO,
    OPERACAO,
    DATA,
    HORA,
    RT,
    DESCRICAO,
    SUBCLASSE,
    TIPO,
    ORIGEM,
    DESTINO,
    PREVISAO,
    SAIDA,
    QUANTIDADE,
    PESO,
    RETIRADO,
    IDENTIFICACAO,
    EMPRESA,
    VALOR,
    OBS,
  } = req.body;


  const sql = `
    INSERT INTO carga (DATA, HORA, RECEBIDO, RT, DESCRICAO, SUBCLASSE, TIPO, ORIGEM, DESTINO, PREVISAO, SAIDA, QUANTIDADE, PESO, RETIRADO, IDENTIFICACAO, EMPRESA, VALOR, OPERACAO, OBS) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;

  const values = [
    DATA,
    HORA,
    RECEBIDO,
    RT,
    DESCRICAO,
    SUBCLASSE,
    TIPO,
    ORIGEM,
    DESTINO,
    PREVISAO,
    SAIDA,
    QUANTIDADE,
    PESO,
    RETIRADO,
    IDENTIFICACAO,
    EMPRESA,
    VALOR,
    OPERACAO,
    OBS,
  ];

  
  db.query(sql, values, (err, result) => {
    

    if (err) {
      console.error("Erro ao inserir dados no banco de dados:", err);
      res.status(500).send("Erro interno ao processar o formulário");
    } else {
      console.log('Dados inseridos com sucesso');
      
      res.send("<script>alert('Formulário enviado com sucesso'); window.location='/pagina-autenticada';</script>");
    }
  });
});



app.get("/reset-password", (req, res) => {
  res.type("text/html"); 
  res.sendFile(path.join(__dirname, "", "auth", "reset-password.html"));
});






//rotas para tratamento e envio do formulário de cadastro 

app.get("/cadastrar", (req, res) => {
  res.type("text/html"); 
  res.sendFile(path.join(__dirname, "", "auth", "cadastrar.html"));
});


app.post('/auth/cadastrar', (req, res) => {
  const { nome, email, senha, confirmarSenha } = req.body;

  
  if (senha !== confirmarSenha) {
    return res.send('As senhas não coincidem.');
  }


  const sql = 'INSERT INTO usuarios (NOME, EMAIL, SENHA) VALUES (?, ?, ?)';
  const values = [nome, email, senha];

  db.query(sql, values, (err, result) => {
    if (err) {
      console.error('Erro ao cadastrar usuário no banco de dados:', err);
      return res.send('Erro ao cadastrar usuário.');
    }

    console.log('Usuário cadastrado com sucesso');
    res.send('Usuário cadastrado com sucesso.');
  });
});





app.get("/login", (req, res) => {
  res.type("text/html"); 
  res.sendFile(path.join(__dirname, "", "auth", "login.html"));
});



app.post("/login", async (req, res) => {
  const { email, password } = req.body;

  try {
    const getPasswordQuery = "SELECT * FROM usuarios WHERE EMAIL = ? AND SENHA = ?";
    const getPasswordResults = await db.query(getPasswordQuery, [email]);

    if (getPasswordResults.length === 0) {
      return res.status(401).json({ message: "Credenciais inválidas" });
    }

    const hashedPassword = getPasswordResults[0].SENHA;
    const passwordMatch = await bcrypt.compare(password, hashedPassword);

    if (passwordMatch) {
      const token = jwt.sign({ email }, secretKey, { expiresIn: "1h" });
      
      
      res.redirect('/pagina-autenticada');
    } else {
      res.status(401).json({ message: "Credenciais inválidas" });
    }
  } catch (error) {
    console.error("Erro ao autenticar o usuário:", error);
    res.status(500).json({ message: "Erro no servidor" });
  }
});





app.get("/pagina-autenticada", (req, res) => {
 
  const paginaAutenticadaPath = path.join(
    __dirname,
    "",
    "pagina-autenticada.html"
  );
  const paginaAutenticadaContent = fs.readFileSync(
    paginaAutenticadaPath,
    "utf8"
  );

  
  res.send(paginaAutenticadaContent);
});

app.get("/consultacargas", (req, res) => {
  res.type("text/html");
  res.sendFile(path.join(__dirname, "", "frontend", "consultacargas.php"));
});



app.get("/carga_one", (req, res) => {
  res.type("text/html"); 
  res.sendFile(path.join(__dirname, "", "frontend", "carga_one.php"));
});




const dbUser = process.env.DB_USER;
const dbPassword = process.env.DB_PASS;

mongoose
  .connect(
    `mongodb+srv://${dbUser}:${dbPassword}@cluster0.upzavyn.mongodb.net/?retryWrites=true&w=majority`
  )
  .then(() => {
    const options = {
      definition: {
        openapi: "3.0.0",
        info: {
          title: "P2 APP_HIBRIDO",
          version: "1.0.0",
          description: "Descrição da sua API",
        },
      },
      apis: ["./routes/swagger.js"],
    };

    const swaggerSpec = swaggerJSDoc(options);

    app.use("/api-docs", swaggerUi.serve, swaggerUi.setup(swaggerSpec));

    app.listen(3000, () => {
      console.log("conexão total bem Sucedida!!");
    });
  })
  .catch((err) => console.log(err));
