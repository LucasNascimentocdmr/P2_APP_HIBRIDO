import React, { useState, useEffect } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';
import { Navbar, Button, Form, Col, Container, Row } from 'react-bootstrap';

function App() {
  const [dataInicial, setDataInicial] = useState('');
  const [dataFinal, setDataFinal] = useState('');
  const [empresa, setEmpresa] = useState('');
  const [infoList, setInfoList] = useState('Carregando...');

  useEffect(() => {
    preencherTabela();
  }, [dataInicial, dataFinal, empresa]);

  const preencherTabela = () => {
    if (dataInicial === '' || dataFinal === '') {
      return;
    }

    if (new Date(dataFinal) < new Date(dataInicial)) {
      return;
    }

    setInfoList('Carregando...');

    // Simulei uma chamada de API usando um setTimeout
    setTimeout(() => {
      setInfoList('Dados carregados');
    }, 1000);
  };

  const handleImprimir = () => {
    // Lógica de impressão aqui
    console.log('Imprimir');
  };

  return (
    <div>
      <Navbar bg="light">
        <Container>
          <Navbar.Brand className="d-flex align-items-center">
            <img
              src="cargas.png"
              alt="Logo"
              width="60"
              height="40"
              className="mr-2"
            />
            <span>Controle de Cargas - SBMI</span>
          </Navbar.Brand>
          <div className="ml-auto">
            <Button variant="danger" id="sair" href="login.html">
              Sair
            </Button>
            <Button variant="danger" id="voltar" href="select.php">
              Voltar
            </Button>
          </div>
        </Container>
      </Navbar>

      <Container className="mt-4">
        <Row className="justify-content-center">
          <Col md="3">
            <Form.Group>
              <Form.Label>Data Inicial:</Form.Label>
              <Form.Control
                type="date"
                value={dataInicial}
                onChange={(e) => setDataInicial(e.target.value)}
              />
            </Form.Group>
          </Col>
          <Col md="3">
            <Form.Group>
              <Form.Label>Data Final:</Form.Label>
              <Form.Control
                type="date"
                value={dataFinal}
                onChange={(e) => setDataFinal(e.target.value)}
              />
            </Form.Group>
          </Col>
          <Col md="3">
            <Form.Group>
              <Form.Label>Empresa:</Form.Label>
              <Form.Control
                as="select"
                value={empresa}
                onChange={(e) => setEmpresa(e.target.value)}
              >
                <option value=""></option>
                <option value="OMNI">OMNI</option>
                <option value="LIDER">LIDER</option>
              </Form.Control>
            </Form.Group>
          </Col>
        </Row>
      </Container>

      <Container className="mt-4">
        <Row className="justify-content-center">
          <Col md="10" className="mx-auto">
            <div className="info-list-container">
              <div id="info-list">{infoList}</div>
            </div>
          </Col>
        </Row>
      </Container>

      <Row>
        <Col md="12" className="mx-auto fixed-bottom">
          <Button variant="danger" onClick={handleImprimir}>
            Imprimir
          </Button>
        </Col>
      </Row>
    </div>
  );
}

export default App;
