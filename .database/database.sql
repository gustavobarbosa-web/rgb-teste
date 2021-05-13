-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 13/05/2021 às 10:09
-- Versão do servidor: 10.1.48-MariaDB-1~bionic
-- Versão do PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `database`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `configuracoes`
--

CREATE TABLE `configuracoes` (
  `id` int(11) UNSIGNED NOT NULL,
  `nome` varchar(50) NOT NULL,
  `valor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `configuracoes`
--

INSERT INTO `configuracoes` (`id`, `nome`, `valor`) VALUES
(1, 'logo', 'logo.png'),
(2, 'telefone_ddd', '00'),
(3, 'telefone_numero', '0000-0000'),
(4, 'rodape_titulo', 'Pessoa ou Empresa'),
(5, 'rodape_texto', 'Lorem ipsum dolor sit amet, lorem consectetur elit. Aliquam id mi ipsum sed ligula sollicitudin fermentum dolor. Aliquam suscipit, massa quis posuere consecttur, enim libero tempor enim, ultriies est turpis nec risus. Nam in libero nulla, eu adipiscing nibh.  In vitae massa vitae suscipit scelerisque lorem psum amed.'),
(6, 'rodape_imagem', '20210513064817sobre.jpg'),
(7, 'rodape_copyright', 'Todos os direitos reservados'),
(9, 'rodape_creditos', '20210513064818creditos.png'),
(10, 'facebook', 'www.fb.com/loremipsum'),
(11, 'twitter', 'www.twitter.com/loremipsum'),
(12, 'flickr', 'www.flickr.com/loremipsum'),
(13, 'titulo', 'RGB Fast');

-- --------------------------------------------------------

--
-- Estrutura para tabela `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) UNSIGNED NOT NULL,
  `desc_curta` varchar(50) NOT NULL DEFAULT '',
  `desc_longa` text NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `galeria`
--

INSERT INTO `galeria` (`id`, `desc_curta`, `desc_longa`, `imagem`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '2021051306560403OY6tFZ1yU.jpg', '2021-05-13 06:56:07', '2021-05-13 06:56:07', NULL),
(4, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '202105130657024jdEiS0Ajxc.jpg', '2021-05-13 06:57:06', '2021-05-13 06:57:06', NULL),
(5, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513065713j1me2bCfj7g.jpg', '2021-05-13 06:57:17', '2021-05-13 06:57:17', NULL),
(6, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513065725jCGpZz16qTg.jpg', '2021-05-13 06:57:29', '2021-05-13 06:57:29', NULL),
(7, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513065757kf2IdYphPBU.jpg', '2021-05-13 06:58:03', '2021-05-13 06:58:03', NULL),
(8, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513065844LeWsIEGlHxc.jpg', '2021-05-13 06:58:48', '2021-05-13 06:58:48', NULL),
(9, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513065857o2SlPdA8jXk.jpg', '2021-05-13 06:59:03', '2021-05-13 06:59:03', NULL),
(10, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513065916OVvAPwO7Wxs.jpg', '2021-05-13 06:59:19', '2021-05-13 06:59:19', NULL),
(11, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513065949pItFfaR8Av8.jpg', '2021-05-13 06:59:53', '2021-05-13 06:59:53', NULL),
(12, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513070004q7V8oSgF_78.jpg', '2021-05-13 07:00:09', '2021-05-13 07:00:09', NULL),
(13, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513070024qRBcdv-2COE.jpg', '2021-05-13 07:00:30', '2021-05-13 07:00:30', NULL),
(14, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513070043T5X03HtB-OA.jpg', '2021-05-13 07:00:49', '2021-05-13 07:00:49', NULL),
(15, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513070103UFMogzHb3WE.jpg', '2021-05-13 07:01:07', '2021-05-13 07:01:07', NULL),
(16, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513070124UkU8rZkz2rk.jpg', '2021-05-13 07:01:29', '2021-05-13 07:01:29', NULL),
(17, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513070137VT3570ldxbQ.jpg', '2021-05-13 07:01:41', '2021-05-13 07:01:41', NULL),
(18, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513070149wsQ5CLcVAMk.jpg', '2021-05-13 07:01:55', '2021-05-13 07:01:55', NULL),
(19, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513070203x9s5tVMncPg.jpg', '2021-05-13 07:02:07', '2021-05-13 07:02:07', NULL),
(20, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513070225ygBshyF1_9M.jpg', '2021-05-13 07:02:32', '2021-05-13 07:02:32', NULL),
(21, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513070240YgygUMFGc18.jpg', '2021-05-13 07:02:45', '2021-05-13 07:02:45', NULL),
(22, 'Nome do Álbum Lorem Ipsum Dolor Amed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam sit amet purus ligula. Nam et nisl hendrerit, vestibulum sem eget, eleifend tortor. Donec eros metus, fermentum nec velit sit amet.', '20210513070252zdREwFpeTtI.jpg', '2021-05-13 07:02:58', '2021-05-13 07:02:58', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '$2y$12$JP6kNM6RvcFP4Tye925JmeX58BR6MlNFlAK4SXNj6adJVaKDUr/O6', '2021-05-12 19:17:47', '2021-05-12 19:17:47', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `configuracoes`
--
ALTER TABLE `configuracoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `configuracoes`
--
ALTER TABLE `configuracoes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
