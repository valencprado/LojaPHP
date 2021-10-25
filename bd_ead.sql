create database bd_ead
default character set utf8
default collate utf8_general_ci;


create table tbl_categoria
(	
    cd_categoria int primary key auto_increment,
    ds_categoria varchar(25) not null    
)
default charset utf8;


create table tbl_banda
(	
    cd_banda int primary key auto_increment,
    nm_banda varchar(45) not null    
)
default charset utf8;


create table tbl_disco
(	
    cd_disco int primary key auto_increment,
    cd_categoria int not null,
    nm_disco varchar(70) not null,
    cd_banda int not null,
    vl_preco decimal(6,2) not null,
    qt_estoque int not null,
    ds_resumo_disco text not null,
    ds_capa varchar(255) not null,
    sg_lancamento enum('S','N') not null,
    constraint fk_cat foreign key(cd_categoria) references tbl_categoria(cd_categoria),
    constraint fk_banda foreign key(cd_banda) references tbl_banda(cd_banda)
)  
default charset utf8;

insert into tbl_categoria
values(default,'Anos 70'),
(default, 'Anos 80'),
(default, 'Anos 90'),
(default, 'Anos 00'),
(default, 'Outros');


insert into tbl_banda
values(default,'Fleetwood Mac'),		-- codigo 1
(default, 'Green Day'),					-- codigo 2	
(default, 'Nirvana'),					-- codigo 3
(default, 'Bring Me The Horizon'),				-- codigo 4
(default, 'Slipknot'),				-- codigo 5
(default, 'The Beatles'),				-- codigo 6
(default, 'Tame Impala'),					-- codigo 7
(default, 'Korn'),			-- codigo 8
(default, 'Linkin Park'),					-- codigo 9
(default, 'Os Mutantes');			    -- codigo 10
			  

insert into tbl_disco
values
(Default,'1','Rumours','1','200.00','10',

'<p>O álbum de estúdio da banda norte-americana Fleetwood Mac marcou o auge do grupo, em 1977. Com faixas memoráveis como "Go Your Own Way", 
"THe Chain" e "Dreams", o projeto, que possui uma história de criação cheia de conflitos internos na banda, ficou semanas nas paradas e é
um marco na música moderna. </p>', 'rumoursfleetwood','N'),
 
 (Default,'3','Nimrod','2','100.00','25',
'<p>Em 1997, Green Day lançou seu quinto álbum de estúdio, "Nimrod". Com fama menor que Dookie, o terceiro álbum, contém a lenta "Good Riddance
 (Time of Your Life). Um disco importante para o rock dos anos 90.  </p>', 'nimrodgreen','N'),

 (Default,'3','Nevermind','3','150.00','20',
'<p>Um dos melhores discos de rock de todos os tempos, Nevermind do Nirvana consolidou o gênero grunge na mídia e nas paradas musicais.
A explosiva "Smells Like Teen Spirit" e "Come As You Are", com seu riff único são algumas das canções que colocaram o álbum em um patamar praticamente
inalcançável.Os videoclipes da banda constantemente apareciam na MTV. </p>', 'nevermindnirvana','N'),
 
(Default,'3','Slipknot','5','100.00','31',
'<p>O primeiro álbum da banda de heavy metal Slipknot, conhecido como autoentitulado, é conhecido por sua agressividade e forma, até então,
única de se fazer metal. Com 9 integrantes praticamente anônimos, usando máscaras e macacões, a banda possui uma idntidade única 
que a transformou em um dos maiores fenômenos do metal moderno. </p>','slipknot','N');
 
 insert into tbl_disco
values 
(Default,'3','Sempiternal','4','100.00','10',
'<p>A mistura de guitarras distorcidas com sinstetizadores eletrônicos tornou o Bring Me THe Horizon conhecido na mídia. O álbum Sempiternal
marca o início dessa mistura, que, em 2013, consolidou-se como uma das maiores bandas de rock da atualidade, sendo mundialmente conhecidos
e fazendo turnê em todas as regiões do mundo.</p>','sempiternalbringme','S'),
  (Default,'4','Hybrid Theory','9','150.00','40',
'<p>No ano 2000, no auge do chamado "Nu Metal", conhecido pela fusão de rap e metal, Linkin Park lança seu primeiro disco, o "Hybrid Theory".
Com vocais limpos de Chester Bennington, o rap de Mike Shinoda e o uso de artifícios eletrônicos fez com que a banda chegasse ao topo do rock,
sendo considerada a maior banda do gênero nos últimos 20 anos.</p>','hybridtheory','N'),
 
(Default,'3','Follow The Leader','8','120.00','40',
'<p>A banda de heavy metal Korn lançou "FOllow The Leader" em 1997. Relacionado ao "Nu Metal", o disco fez sucesso, o que se deve principalmente
à música "Freak On a Leash".</p>
 <p></p>','followtheleader','N'),

 (Default,'5','Os Mutantes','10','200.00','5',
'<p>A banda de rock psicodélico "Os Mutantes", composta originalmente por Sérgio Dias, Rita Lee e Arnaldo Baptista. Seu álbum de estreia, de mesmo nome,
se tornou uma grande influência no rock e na música brasileira, dado a seu som inovador na época que foi lançado.</p>
','osmutantes','N');
 
 insert into tbl_disco
 values
 (Default,'5','Currents','7','200.00','10',
'<p> Em 2015, foi lançado o terceiro trabalho da banda australiana Tame Impala. Com uma espécie de rock psicodélico com um pouco ded R&B, o disco
ficou nas paradas ao redor do mundo, com vários sucessos, sendo o principal "The Less I Know The Better". </p>','currentstame','N'),
 
 (Default,'5','Abbey Road','6','250.00','5',
'<p>O último álbum gravado pelos Beatles, "Abbey Road" é um clássico da música moderna, com uma capa memorável até os dias atuais. desse disco, músicas
como "Come Together" e "Here Comes The Sun" são algumas das mais famosas do grupo inglês.</p>','abbeyroad','N');

select * from tbl_disco;

create view vw_disco as select 
tbl_disco.cd_disco,
 tbl_categoria.ds_categoria,
 tbl_disco.nm_disco,
 tbl_banda.nm_banda,
 tbl_disco.vl_preco,
 tbl_disco.qt_estoque,
 tbl_disco.ds_capa,
 tbl_disco.sg_lancamento
 from tbl_disco inner join tbl_banda
 on tbl_disco.cd_banda = tbl_banda.cd_banda
 inner join tbl_categoria 
 on tbl_disco.cd_categoria = tbl_categoria.cd_categoria;
 select * from vw_disco;
 select nm_banda, nm_disco, vl_preco, ds_capa from vw_disco;
 
 CREATE USER 'discozz'@'localhost' IDENTIFIED WITH mysql_native_password BY 'Figure.09';
 GRANT ALL PRIVILEGES ON db_ead.* TO 'ead'@'localhost' WITH GRANT OPTION;
 
 