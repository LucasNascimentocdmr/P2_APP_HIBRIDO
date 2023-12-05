// routes/swagger.js

/**
 * @swagger
 * tags:
 *   name: Inicios
 *   description: Rotas relacionadas à página inicial
 */

/**
 * @swagger
 * /:
 *   get:
 *     summary: Retorna uma mensagem de boas-vindas
 *     tags: [Home]
 *     responses:
 *       200:
 *         description: Mensagem de boas-vindas
 */
const express = require("express");
const router = express.Router();

router.get("/", (req, res) => {
  res.status(200).json({ msg: "Bem-vindo! Documentação da API" });
});

module.exports = router;
