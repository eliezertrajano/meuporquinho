<?php
date_default_timezone_set("America/Sao_Paulo");
//error_reporting(0);

if (!isset($_SESSION)) {
    session_start();
}
if (!isset($mes)) {
    $mes = date("m");
}
if (!isset($ano)) {
    $ano = date("Y");
}
if (!isset($parametro)) {
    $parametro = array("","","","","","","","","","");
}

// FINANCEIRO ///////////////

define("LISTAR_VALORES_ANO_DETALHES", "select id,nom_categoria,ind_categoria,tip_grupo,
 (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where mes_lancamento ='01' and seq_categoria = c.id and  ind_acompanhamento = 0 and ano_lancamento = '".$parametro[0]."' and l.seq_usuario = '".$_SESSION["seq_usuario"]."'  ) as '1',
 (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where mes_lancamento ='02' and seq_categoria = c.id  and  ind_acompanhamento = 0 and ano_lancamento = '".$parametro[0]."' and l.seq_usuario = '".$_SESSION["seq_usuario"]."'   ) as '2',
 (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where mes_lancamento ='03' and seq_categoria = c.id  and  ind_acompanhamento = 0 and ano_lancamento = '".$parametro[0]."' and l.seq_usuario = '".$_SESSION["seq_usuario"]."'  ) as '3',
 (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where mes_lancamento ='04' and seq_categoria = c.id  and  ind_acompanhamento = 0 and ano_lancamento = '".$parametro[0]."' and l.seq_usuario = '".$_SESSION["seq_usuario"]."'  ) as '4', 
 (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where mes_lancamento ='05' and seq_categoria = c.id  and  ind_acompanhamento = 0 and ano_lancamento = '".$parametro[0]."' and l.seq_usuario = '".$_SESSION["seq_usuario"]."'  ) as '5',
 (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where mes_lancamento ='06' and seq_categoria = c.id  and  ind_acompanhamento = 0 and ano_lancamento = '".$parametro[0]."' and l.seq_usuario = '".$_SESSION["seq_usuario"]."'  ) as '6',
 (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where mes_lancamento ='07' and seq_categoria = c.id  and  ind_acompanhamento = 0 and ano_lancamento = '".$parametro[0]."' and l.seq_usuario = '".$_SESSION["seq_usuario"]."'  ) as '7',
 (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where mes_lancamento ='08' and seq_categoria = c.id  and  ind_acompanhamento = 0 and ano_lancamento = '".$parametro[0]."' and l.seq_usuario = '".$_SESSION["seq_usuario"]."'  ) as '8',
 (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where mes_lancamento ='09' and seq_categoria = c.id  and  ind_acompanhamento = 0 and ano_lancamento = '".$parametro[0]."' and l.seq_usuario = '".$_SESSION["seq_usuario"]."'  ) as '9' ,
 (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where mes_lancamento ='10' and seq_categoria = c.id  and  ind_acompanhamento = 0 and ano_lancamento = '".$parametro[0]."' and l.seq_usuario = '".$_SESSION["seq_usuario"]."'  ) as '10',
 (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where mes_lancamento ='11' and seq_categoria = c.id  and  ind_acompanhamento = 0 and ano_lancamento = '".$parametro[0]."' and l.seq_usuario = '".$_SESSION["seq_usuario"]."'  ) as '11',
 (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where mes_lancamento ='12' and seq_categoria = c.id  and  ind_acompanhamento = 0 and ano_lancamento = '".$parametro[0]."' and l.seq_usuario = '".$_SESSION["seq_usuario"]."'  ) as '12'
 from categoria as c
 where  c.seq_usuario = '".$_SESSION["seq_usuario"]."' 
 and tip_grupo = '".$parametro[1]."'
 group by c.id
 order by c.ind_categoria desc");

define("EXIBIR_GURPOSCATEGORIA","select c.tip_grupo, ca.nom_grupo from categoria c
left join categoria_grupo ca on ca.tip_grupo = c.tip_grupo
where c.seq_usuario ='".$_SESSION["seq_usuario"]."'
GROUP by c.tip_grupo order by ca.ind_ordem asc");


define("MAIOR_QTD_GASTO_CATEGORIA", "
select l.ano_lancamento as ano, l.mes_lancamento as mes, c.seq_categoria as codigo,
       c.nom_categoria as descricao, count(1) as qtd
  from lancamento l
    inner join categoria c
      on l.seq_categoria = c.seq_categoria
  where l.ano_lancamento ='".$parametro[0]."'
    and l.mes_lancamento ='".$parametro[1]."'
    and l.seq_usuario ='".$_SESSION["seq_usuario"]."' 
     and  l.ind_acompanhamento = 0 
  group by l.ano_lancamento,l.mes_lancamento,c.seq_categoria
    order by count(1) desc");

define("MAIOR_VALOR_GASTO_CATEGORIA", "
select l.ano_lancamento as ano, l.mes_lancamento as mes, c.seq_categoria as codigo,
       c.nom_categoria as descricao, coalesce(round(sum(val_lancamento),2),0) as valor
  from lancamento l
    inner join categoria c
      on l.seq_categoria = c.seq_categoria
  where l.ano_lancamento ='".$parametro[0]."'
    and l.mes_lancamento ='".$parametro[1]."'
    and l.seq_usuario = '".$_SESSION["seq_usuario"]."' 
     and  l.ind_acompanhamento = 0 
  group by l.ano_lancamento,l.mes_lancamento,c.seq_categoria
    order by sum(val_lancamento) asc");

define("LISTAR_VALORES_DETALHES", "
select l.id, l.txt_lancamento, l.dat_lancamento, l.txt_lancamento, l.tip_origem ,l.val_lancamento
  from lancamento l
    where   
    l.ano_lancamento = trim('".$parametro[0]."')
      and l.mes_lancamento = trim('".$parametro[1] ."')
      and l.seq_categoria =trim('".$parametro[2] ."')  ");

define("LISTAR_REGRAS", "
select r.id,r.des_regra as regra, c.nom_categoria as categoria, 
       case when c.ind_categoria = 'R' then 'Receita' 
        when c.ind_categoria = 'I' then 'Investimento' 
        when c.ind_categoria = 'D' then 'Despesa' end as tipo,
        g.nom_grupo as grupo
from regra r 
  inner join categoria c 
    on r.seq_categoria = c.id
  inner join categoria_grupo g
    on c.tip_grupo = g.tip_grupo
where r.seq_usuario = '".$_SESSION["seq_usuario"]."' 
order by c.nom_categoria, r.des_regra");

define("LISTAR_CATEGORIAS_DETALHES", "
select c.id, c.nom_categoria as descricao,
       case when c.ind_categoria = 'R' then 'Receita' 
        when c.ind_categoria = 'I' then 'Investimento' 
        when c.ind_categoria = 'D' then 'Despesa' end as tipo,
        g.nom_grupo
FROM categoria c 
  inner join categoria_grupo g
    on c.tip_grupo = g.tip_grupo
  where  c.seq_usuario = '".$_SESSION["seq_usuario"]."' 
order by c.nom_categoria");

define("LISTAR_ANOS_DISPONIVEIS", "
select distinct ano_lancamento as id, ano_lancamento as valor
from lancamento l
where l.ano_lancamento <> 0  
  and l.seq_usuario='".$_SESSION["seq_usuario"]."'
order by l.ano_lancamento desc");
