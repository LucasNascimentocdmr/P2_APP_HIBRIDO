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

// Configurar a conexão com o banco de dados MySQL
const db = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "carga",
});

// Conectar ao banco de dados
db.connect((err) => {
  if (err) {
    console.error("Erro ao conectar ao banco de dados:", err);
  } else {
    console.log("Conectado ao banco de dados com sucesso");
  }
});

// Rota para obter dados da tabela
app.get('/dados', (req, res) => {
  const consulta = 'SELECT * FROM carga';

  connection.query(consulta, (err, result) => {
    if (err) {
      console.error('Erro na consulta ao banco de dados:', err);
      res.status(500).json({ error: 'Erro interno do servidor' });
      return;
    }

    res.json(result);
  });
});


// Rota para servir o arquivo carga_one.php
app.get("/carga_one", (req, res) => {
  res.sendFile(path.join(__dirname, "frontend", "carga_one.php"));
  res.type("text/html");
});



// Rota para lidar com o envio do formulário
app.post("/carga_one", (req, res) => {
  // Obter os dados do formulário a partir do corpo da solicitação
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

  // Construir a consulta SQL para inserir os dados no banco de dados
  const sql = `
    INSERT INTO carga (DATA, HORA, RECEBIDO, RT, DESCRICAO, SUBCLASSE, TIPO, ORIGEM, DESTINO, PREVISAO, SAIDA, QUANTIDADE, PESO, RETIRADO, IDENTIFICACAO, EMPRESA, VALOR, OPERACAO, OBS) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;

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

  // Executar a consulta SQL com os dados do formulário
  db.query(sql, values, (err, result) => {
    // Executar a consulta SQL com os dados do formulário

    if (err) {
      console.error("Erro ao inserir dados no banco de dados:", err);
      res.status(500).send("Erro interno ao processar o formulário");
    } else {
      console.log("Dados inseridos com sucesso");
      res.status(200).send("Formulário enviado com sucesso");
    }
  });
});


app.post("/carga_two", (req, res) => {
  const {
    recebido,
    operacao,
    data,
    hora,
    rt,
    descricao,
    sub,
    tclasse,
    origem,
    destino,
    datap,
    datas,
    quantidade,
    peso,
    valor,
    obs,
  } = req.body;

  const sql = `
    INSERT INTO carga (DATA, HORA, RECEBIDO, RT, DESCRICAO, SUBCLASSE, TIPO, ORIGEM, DESTINO, PREVISAO, SAIDA, QUANTIDADE, PESO, RETIRADO, IDENTIFICACAO, EMPRESA, VALOR, OPERACAO, OBS) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)`;

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
      console.error("Error inserting data into the database:", err);
      res.status(500).send("Internal error while processing the form");
    } else {
      console.log("Data inserted successfully");
      res.status(200).send("Form submitted successfully");
    }
  });
});

app.get("/login", (req, res) => {
  res.type("text/html"); // Defina o tipo de conteúdo como HTML
  res.sendFile(path.join(__dirname, "", "frontend", "login.html"));
});

app.get("/user/:id", async (req, res) => {
  const id = req.params.id;

  try {
    const user = await User.findById(id, "-password");

    if (!user) {
      return res.status(404).json({ msg: "Usuário não encontrado" });
    }

    res.status(200).json({ user });
  } catch (error) {
    console.log(error);
    res.status(500).json({ msg: error.message });
  }
});

app.put("/user/:id", async (req, res) => {
  const id = req.params.id;
  const { name, email } = req.body;

  try {
    const updatedUser = await User.findByIdAndUpdate(
      id,
      { name, email },
      { new: true }
    );

    if (!updatedUser) {
      return res.status(404).json({ msg: "Usuário não encontrado" });
    }

    res.status(200).json({
      msg: "Informações do usuário atualizadas com sucesso",
      user: updatedUser,
    });
  } catch (error) {
    console.log(error);
    res.status(500).json({ msg: error.message });
  }
});

app.delete("/user/:id", async (req, res) => {
  const id = req.params.id;

  try {
    const deletedUser = await User.findByIdAndDelete(id);

    if (!deletedUser) {
      return res.status(404).json({ msg: "Usuário não encontrado" });
    }

    res
      .status(200)
      .json({ msg: "Usuário excluído com sucesso", user: deletedUser });
  } catch (error) {
    console.log(error);
    res.status(500).json({ msg: error.message });
  }
});

app.get("/users", async (req, res) => {
  try {
    const users = await User.find({}, "-password");
    res.status(200).json({ users });
  } catch (error) {
    console.log(error);
    res.status(500).json({ msg: error.message });
  }
});

/*registros*/
app.post("/auth/register", async (req, res) => {
  const { name, email, password, confirmPassword } = req.body;

  /*validação*/
  if (!name || !email || !password || password !== confirmPassword) {
    return res
      .status(422)
      .json({ msg: "Por favor, forneça informações válidas." });
  }

  try {
    const userExists = await User.findOne({ email });

    if (userExists) {
      return res.status(422).json({ msg: "Utilize outro email." });
    }

    const salt = await bcrypt.genSalt(12);
    const passwordHash = await bcrypt.hash(password, salt);

    const newUser = new User({
      name,
      email,
      password: passwordHash,
    });

    await newUser.save();

    res.status(201).json({ msg: "Usuário criado com sucesso!" });
  } catch (error) {
    console.log(error);
    res.status(500).json({ msg: error.message });
  }
});

app.post("/auth/login", (req, res) => {
  const { email, password } = req.body;

  // Verifique as credenciais do usuário (substitua isso com a lógica de autenticação real)
  if (email === "admin@admin.com" && password === "admin") {
    // Crie um token JWT
    const token = jwt.sign({ email }, secretKey, { expiresIn: "1h" });

    // Envie o token como resposta
    res.json({ token });
  } else {
    res.status(401).json({ message: "Credenciais inválidas" });
  }
});

app.get("/pagina-autenticada", (req, res) => {
  // Leia o conteúdo do arquivo HTML
  const paginaAutenticadaPath = path.join(
    __dirname,
    "",
    "pagina-autenticada.html"
  );
  const paginaAutenticadaContent = fs.readFileSync(
    paginaAutenticadaPath,
    "utf8"
  );

  // Envie o conteúdo como resposta
  res.send(paginaAutenticadaContent);
});

app.get("/consultacargas", (req, res) => {
  res.type("text/html");
  res.sendFile(path.join(__dirname, "", "frontend", "consultacargas.php"));
});

// Rota para Faturamento
app.get("/faturamento", (req, res) => {
  res.type("text/html");
  res.sendFile(path.join(__dirname, "", "frontend", "faturamento.js"));
});

// Rota para Carga One
app.get("/carga_one", (req, res) => {
  res.type("text/html"); // Defina o tipo de conteúdo como HTML
  res.sendFile(path.join(__dirname, "", "frontend", "carga_one.php"));
});

app.get("/carga_two", (req, res) => {
  res.type("text/html");
  res.sendFile(path.join(__dirname, "", "frontend", "carga_two.php"));
});

/*credenciais*/
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
