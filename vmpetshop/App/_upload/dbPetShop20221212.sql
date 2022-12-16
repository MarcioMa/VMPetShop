-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: db_petshop
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_cliente`
--

DROP TABLE IF EXISTS `tbl_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_cliente` (
  `cli_id` int NOT NULL,
  `cli_nome` varchar(80) NOT NULL,
  `cli_login` varchar(20) NOT NULL,
  `cli_senha` varchar(20) NOT NULL,
  `cli_contato` varchar(20) NOT NULL,
  `cli_email` varchar(80) NOT NULL,
  `cli_endereco` varchar(80) DEFAULT NULL,
  `cli_status` char(1) DEFAULT NULL,
  `usu_id` int DEFAULT NULL,
  PRIMARY KEY (`cli_id`),
  KEY `FK_tbl_cliente_2` (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cliente`
--

LOCK TABLES `tbl_cliente` WRITE;
/*!40000 ALTER TABLE `tbl_cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_fornecedor`
--

DROP TABLE IF EXISTS `tbl_fornecedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_fornecedor` (
  `fornecedor_id` int NOT NULL,
  `fornecedor_name` varchar(80) NOT NULL,
  `fornecedor_contato` varchar(20) NOT NULL,
  `fornecedor_login` varchar(20) NOT NULL,
  `fornecedor_senha` varchar(20) NOT NULL,
  `fornecedor_descricao` varchar(255) DEFAULT NULL,
  `fornecedor_email` varchar(80) NOT NULL,
  `fornecedor_site` varchar(255) DEFAULT NULL,
  `usu_id` int DEFAULT NULL,
  PRIMARY KEY (`fornecedor_id`),
  KEY `FK_tbl_fornecedor_2` (`usu_id`),
  CONSTRAINT `FK_tbl_fornecedor_2` FOREIGN KEY (`usu_id`) REFERENCES `tbl_usuario` (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_fornecedor`
--

LOCK TABLES `tbl_fornecedor` WRITE;
/*!40000 ALTER TABLE `tbl_fornecedor` DISABLE KEYS */;
INSERT INTO `tbl_fornecedor` VALUES (1,'Fornecedor1','6136370098','for123','123456','fornecedor teste 1','f1@email.com','nda',1),(2,'Fornecedor2','6236330088','for456','456789','fornecedor teste 2','f2@email.com','www.f2.com.br',1);
/*!40000 ALTER TABLE `tbl_fornecedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ordem_servico`
--

DROP TABLE IF EXISTS `tbl_ordem_servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_ordem_servico` (
  `os_id` int NOT NULL,
  `os_numero` decimal(10,0) NOT NULL,
  `os_cliente_id` int NOT NULL,
  `os_status` char(1) DEFAULT NULL,
  `os_data` date NOT NULL,
  `os_dt_entrega` date NOT NULL,
  `os_totalvalor` float NOT NULL,
  `os_items` varchar(80) DEFAULT NULL,
  `usu_id` int DEFAULT NULL,
  PRIMARY KEY (`os_id`),
  UNIQUE KEY `os_cliente_id_UNIQUE` (`os_cliente_id`),
  KEY `FK_tbl_ordem_servico_2` (`usu_id`),
  CONSTRAINT `FK_tbl_ordem_servico_2` FOREIGN KEY (`usu_id`) REFERENCES `tbl_usuario` (`usu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_tbl_ordem_servico_3` FOREIGN KEY (`os_cliente_id`) REFERENCES `tbl_cliente` (`cli_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ordem_servico`
--

LOCK TABLES `tbl_ordem_servico` WRITE;
/*!40000 ALTER TABLE `tbl_ordem_servico` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_ordem_servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_os_descricao`
--

DROP TABLE IF EXISTS `tbl_os_descricao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_os_descricao` (
  `desc_id` int NOT NULL,
  `desc_os_id` int DEFAULT NULL,
  `desc_produto_id` varchar(255) NOT NULL,
  `desc_quantia` decimal(10,0) NOT NULL,
  `desc_preco` float NOT NULL,
  `desc_status` char(1) NOT NULL,
  `desc_observacao` varchar(255) DEFAULT NULL,
  `fornecedor_id` int DEFAULT NULL,
  PRIMARY KEY (`desc_id`),
  KEY `FK_tbl_os_descricao_2` (`fornecedor_id`),
  KEY `FK_tbl_os_descricao_3` (`desc_os_id`),
  CONSTRAINT `FK_tbl_os_descricao_2` FOREIGN KEY (`fornecedor_id`) REFERENCES `tbl_fornecedor` (`fornecedor_id`),
  CONSTRAINT `FK_tbl_os_descricao_3` FOREIGN KEY (`desc_os_id`) REFERENCES `tbl_produto` (`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_os_descricao`
--

LOCK TABLES `tbl_os_descricao` WRITE;
/*!40000 ALTER TABLE `tbl_os_descricao` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_os_descricao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pagamento`
--

DROP TABLE IF EXISTS `tbl_pagamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_pagamento` (
  `pg_id` int NOT NULL,
  `pg_numero` varchar(80) DEFAULT NULL,
  `pg_recebido` date DEFAULT NULL,
  `pg_valor` float DEFAULT NULL,
  `pg_status` char(1) DEFAULT NULL,
  `pg_pagador` varchar(80) DEFAULT NULL,
  `pg_obs` varchar(255) DEFAULT NULL,
  `usu_id` int DEFAULT NULL,
  PRIMARY KEY (`pg_id`),
  KEY `FK_tbl_pagamento_2` (`usu_id`),
  CONSTRAINT `FK_tbl_pagamento_2` FOREIGN KEY (`usu_id`) REFERENCES `tbl_usuario` (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pagamento`
--

LOCK TABLES `tbl_pagamento` WRITE;
/*!40000 ALTER TABLE `tbl_pagamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pagamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pet`
--

DROP TABLE IF EXISTS `tbl_pet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_pet` (
  `pet_id` int NOT NULL,
  `pet_nome` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pet_images` blob,
  `pet_cliente_id` int DEFAULT NULL,
  `pet_categoria_id` int DEFAULT NULL,
  `pet_fornecedor_id` int DEFAULT NULL,
  `pet_descricao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pet_status` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `usu_id_` int DEFAULT NULL,
  PRIMARY KEY (`pet_id`),
  KEY `FK_tbl_pet_2` (`usu_id_`),
  KEY `FK_tbl_pet_3` (`pet_cliente_id`),
  KEY `FK_tbl_pet_4` (`pet_categoria_id`),
  KEY `FK_tbl_pet_5` (`pet_fornecedor_id`),
  CONSTRAINT `FK_tbl_pet_2` FOREIGN KEY (`usu_id_`) REFERENCES `tbl_usuario` (`usu_id`),
  CONSTRAINT `FK_tbl_pet_3` FOREIGN KEY (`pet_cliente_id`) REFERENCES `tbl_cliente` (`cli_id`),
  CONSTRAINT `FK_tbl_pet_4` FOREIGN KEY (`pet_categoria_id`) REFERENCES `tbl_pet_categoria` (`pet_categoria_id`),
  CONSTRAINT `FK_tbl_pet_5` FOREIGN KEY (`pet_fornecedor_id`) REFERENCES `tbl_fornecedor` (`fornecedor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pet`
--

LOCK TABLES `tbl_pet` WRITE;
/*!40000 ALTER TABLE `tbl_pet` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pet_categoria`
--

DROP TABLE IF EXISTS `tbl_pet_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_pet_categoria` (
  `pet_categoria_id` int NOT NULL,
  `pet_categoria_nome` varchar(80) NOT NULL,
  `usu_id` int DEFAULT NULL,
  PRIMARY KEY (`pet_categoria_id`),
  KEY `FK_tbl_pet_categoria_2` (`usu_id`),
  CONSTRAINT `FK_tbl_pet_categoria_2` FOREIGN KEY (`usu_id`) REFERENCES `tbl_usuario` (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pet_categoria`
--

LOCK TABLES `tbl_pet_categoria` WRITE;
/*!40000 ALTER TABLE `tbl_pet_categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pet_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produto`
--

DROP TABLE IF EXISTS `tbl_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_produto` (
  `prod_id` int NOT NULL,
  `prod_categoria_id` int DEFAULT NULL,
  `prod_fornecedor_id` int DEFAULT NULL,
  `prod_nome` varchar(80) NOT NULL,
  `prod_descrica` varchar(255) DEFAULT NULL,
  `Preco_Venda` float NOT NULL,
  `prod_custo` float NOT NULL,
  `prod_quantia` float NOT NULL,
  `prod_status` char(1) DEFAULT NULL,
  `usu_id` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `FK_tbl_produto_2` (`prod_fornecedor_id`),
  KEY `FK_tbl_produto_3` (`prod_categoria_id`),
  CONSTRAINT `FK_tbl_produto_2` FOREIGN KEY (`prod_fornecedor_id`) REFERENCES `tbl_fornecedor` (`fornecedor_id`),
  CONSTRAINT `FK_tbl_produto_3` FOREIGN KEY (`prod_categoria_id`) REFERENCES `tbl_produto_categoria` (`prod_categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produto`
--

LOCK TABLES `tbl_produto` WRITE;
/*!40000 ALTER TABLE `tbl_produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_produto_categoria`
--

DROP TABLE IF EXISTS `tbl_produto_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_produto_categoria` (
  `prod_categoria_id` int NOT NULL,
  `prod_categoria_name` varchar(80) NOT NULL,
  `usu_id` int DEFAULT NULL,
  PRIMARY KEY (`prod_categoria_id`),
  KEY `FK_tbl_produto_categoria_2` (`usu_id`),
  CONSTRAINT `FK_tbl_produto_categoria_2` FOREIGN KEY (`usu_id`) REFERENCES `tbl_usuario` (`usu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_produto_categoria`
--

LOCK TABLES `tbl_produto_categoria` WRITE;
/*!40000 ALTER TABLE `tbl_produto_categoria` DISABLE KEYS */;
INSERT INTO `tbl_produto_categoria` VALUES (1,'Produto teste1',1),(2,'Produto teste2',1);
/*!40000 ALTER TABLE `tbl_produto_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_servico`
--

DROP TABLE IF EXISTS `tbl_servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_servico` (
  `servico_id` int NOT NULL,
  `serv_num` varchar(80) NOT NULL,
  `serv_name` varchar(80) NOT NULL,
  `serv_descricao` varchar(255) DEFAULT NULL,
  `serv_taxa` float DEFAULT NULL,
  `serv_fornecedor_id` int DEFAULT NULL,
  `usu_id` int DEFAULT NULL,
  PRIMARY KEY (`servico_id`),
  KEY `FK_tbl_servico_2` (`usu_id`),
  KEY `FK_tbl_servico_3` (`serv_fornecedor_id`),
  CONSTRAINT `FK_tbl_servico_2` FOREIGN KEY (`usu_id`) REFERENCES `tbl_usuario` (`usu_id`),
  CONSTRAINT `FK_tbl_servico_3` FOREIGN KEY (`serv_fornecedor_id`) REFERENCES `tbl_fornecedor` (`fornecedor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_servico`
--

LOCK TABLES `tbl_servico` WRITE;
/*!40000 ALTER TABLE `tbl_servico` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_usuario` (
  `usu_id` int NOT NULL,
  `usu_login` varchar(40) NOT NULL,
  `usu_senha` varchar(255) NOT NULL,
  `usu_name` varchar(80) NOT NULL,
  `usu_email` varchar(80) NOT NULL,
  `usu_contato` varchar(80) DEFAULT NULL,
  `usu_grupo_id` int NOT NULL,
  `usu_status` char(1) DEFAULT NULL,
  PRIMARY KEY (`usu_id`),
  CONSTRAINT `FK_usuario_idGrupo` FOREIGN KEY (`usu_id`) REFERENCES `tbl_usuario_grupo` (`grupo_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','admin@email.com.br','61112231111',1,'A'),(2,'operador','	06d4f07c943a4da1c8bfe591abbc3579','operador','operador@email.com.br','6122223333',2,'A');
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario_grupo`
--

DROP TABLE IF EXISTS `tbl_usuario_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_usuario_grupo` (
  `grupo_id` int NOT NULL,
  `grupo_nome` varchar(80) NOT NULL,
  `grupo_descricao` varchar(255) DEFAULT NULL,
  `Permitir_adicionar` char(1) DEFAULT NULL,
  `Permitir_edicao` char(1) DEFAULT NULL,
  `Permitir_deletar` char(1) DEFAULT NULL,
  `Permitir_imprimir` char(1) DEFAULT NULL,
  `Permitir_importar` char(1) DEFAULT NULL,
  `Permitir_exportar` char(1) DEFAULT NULL,
  PRIMARY KEY (`grupo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario_grupo`
--

LOCK TABLES `tbl_usuario_grupo` WRITE;
/*!40000 ALTER TABLE `tbl_usuario_grupo` DISABLE KEYS */;
INSERT INTO `tbl_usuario_grupo` VALUES (1,'Administador','Administradores do sistema','A','A','A','A','A','A'),(2,'Operador','Operadores do sistema','A','A','A','A','A','A'),(3,'Cliente','Cliente do sistema','A','I','A','A','I','I'),(4,'Fornecedor','Fornecedor de Podruto','I','I','I','I','I','I');
/*!40000 ALTER TABLE `tbl_usuario_grupo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-12  0:52:09
