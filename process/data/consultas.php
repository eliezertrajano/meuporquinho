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

define('SELECIONAR_LANCAMENTOS','select l.*,c.nom_categoria from lancamento l
            left join categoria c on l.seq_categoria = c.id
            where txt_lancamento like "%'.$parametro[0].'%"
            and l.seq_usuario ="'.$_SESSION["seq_usuario"].'"');

define("EXIBIR_GURPOSCATEGORIA","(SELECT cg.nom_grupo,cg.tip_grupo,
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 1 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo group by c.tip_grupo) as 'Janeiro',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 2 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo group by c.tip_grupo) as 'Fevereiro',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 3 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo group by c.tip_grupo) as 'Marco',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 4 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo group by c.tip_grupo) as 'Abril',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 5 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo group by c.tip_grupo) as 'Maio',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 6 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo group by c.tip_grupo) as 'Junho',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 7 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo group by c.tip_grupo) as 'Julho',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 8 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo group by c.tip_grupo) as 'Agosto',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 9 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo group by c.tip_grupo) as 'Setembro',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 10 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo group by c.tip_grupo) as 'Outubro',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 11 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo group by c.tip_grupo) as 'Novembro',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 12 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo group by c.tip_grupo) as 'Dezembro'
                                from categoria_grupo cg
                                inner join categoria cat
                                on cg.tip_grupo = cat.tip_grupo
                                where cat.seq_usuario ='".$_SESSION["seq_usuario"]."'
                                group by cg.tip_grupo
                                order by cg.tip_classificacao desc, cg.nom_grupo asc)
                                union
                                (SELECT 'Sem categoria','SEM',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 1 and l.seq_usuario = '".$_SESSION["seq_usuario"]."' and l.seq_categoria is null) as 'Janeiro',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 2 and l.seq_usuario = '".$_SESSION["seq_usuario"]."' and l.seq_categoria is null) as 'Fevereiro',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 3 and l.seq_usuario = '".$_SESSION["seq_usuario"]."' and l.seq_categoria is null) as 'Marco',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 4 and l.seq_usuario = '".$_SESSION["seq_usuario"]."' and l.seq_categoria is null) as 'Abril',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 5 and l.seq_usuario = '".$_SESSION["seq_usuario"]."' and l.seq_categoria is null) as 'Maio',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 6 and l.seq_usuario = '".$_SESSION["seq_usuario"]."' and l.seq_categoria is null) as 'Junho',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 7 and l.seq_usuario = '".$_SESSION["seq_usuario"]."' and l.seq_categoria is null) as 'Julho',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 8 and l.seq_usuario = '".$_SESSION["seq_usuario"]."' and l.seq_categoria is null) as 'Agosto',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 9 and l.seq_usuario = '".$_SESSION["seq_usuario"]."' and l.seq_categoria is null) as 'Setembro',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 10 and l.seq_usuario = '".$_SESSION["seq_usuario"]."' and l.seq_categoria is null) as 'Outubro',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 11 and l.seq_usuario = '".$_SESSION["seq_usuario"]."' and l.seq_categoria is null) as 'Novembro',
                                (select coalesce(round(sum(val_lancamento),2),0) from lancamento l where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 12 and l.seq_usuario = '".$_SESSION["seq_usuario"]."' and l.seq_categoria is null) as 'Dezembro')");

define("RESUMO_GASTOS","(SELECT 
            case upper(trim(tip_classificacao))
                when 'I' then 'Total de Investimentos'  
                when 'R' then 'Total de Receitas'     
            end as tip_classificacao,
            
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 1 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) as 'Janeiro',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 2 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) as 'Fevereiro',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 3 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) as 'Marco',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 4 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) as 'Abril',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 5 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) as 'Maio',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 6 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) as 'Junho',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 7 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) as 'Julho',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 8 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) as 'Agosto',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 9 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) as 'Setembro',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 10 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) as 'Outubro',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 11 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) as 'Novembro',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 12 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) as 'Dezembro'
            from categoria_grupo cg
            inner join categoria cat
            on cg.tip_grupo = cat.tip_grupo
            where cat.seq_usuario = '".$_SESSION["seq_usuario"]."'
             and tip_classificacao in ('R','I')
            group by cg.tip_classificacao
            order by cg.tip_classificacao desc)
            union
            (SELECT 'Total de Despesas' as tip_classificacao,
            (select sum(d.val_lancamento) from vw_despesa d where d.ano_lancamento = '".$parametro[0]."' and d.mes_lancamento = 1 and d.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Janeiro',
            (select sum(d.val_lancamento) from vw_despesa d where d.ano_lancamento = '".$parametro[0]."' and d.mes_lancamento = 2 and d.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Fevereiro',
            (select sum(d.val_lancamento) from vw_despesa d where d.ano_lancamento = '".$parametro[0]."' and d.mes_lancamento = 3 and d.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Marco',
            (select sum(d.val_lancamento) from vw_despesa d where d.ano_lancamento = '".$parametro[0]."' and d.mes_lancamento = 4 and d.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Abril',
            (select sum(d.val_lancamento) from vw_despesa d where d.ano_lancamento = '".$parametro[0]."' and d.mes_lancamento = 5 and d.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Maio',
            (select sum(d.val_lancamento) from vw_despesa d where d.ano_lancamento = '".$parametro[0]."' and d.mes_lancamento = 6 and d.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Junho',
            (select sum(d.val_lancamento) from vw_despesa d where d.ano_lancamento = '".$parametro[0]."' and d.mes_lancamento = 7 and d.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Julho',
            (select sum(d.val_lancamento) from vw_despesa d where d.ano_lancamento = '".$parametro[0]."' and d.mes_lancamento = 8 and d.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Agosto',
            (select sum(d.val_lancamento) from vw_despesa d where d.ano_lancamento = '".$parametro[0]."' and d.mes_lancamento = 9 and d.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Setembro',
            (select sum(d.val_lancamento) from vw_despesa d where d.ano_lancamento = '".$parametro[0]."' and d.mes_lancamento = 10 and d.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Outubro',
            (select sum(d.val_lancamento) from vw_despesa d where d.ano_lancamento = '".$parametro[0]."' and d.mes_lancamento = 11 and d.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Novembro',
            (select sum(d.val_lancamento) from vw_despesa d where d.ano_lancamento = '".$parametro[0]."' and d.mes_lancamento = 12 and d.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Dezembro')
            union
            (SELECT 'Saldo',
            (select sum(l.val_lancamento) from lancamento l where l.seq_categoria is not null and l.ind_acompanhamento = 0 and l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 1 and l.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Janeiro',
            (select sum(l.val_lancamento) from lancamento l where l.seq_categoria is not null and l.ind_acompanhamento = 0 and l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 2 and l.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Fevereiro',
            (select sum(l.val_lancamento) from lancamento l where l.seq_categoria is not null and l.ind_acompanhamento = 0 and l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 3 and l.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Marco',
            (select sum(l.val_lancamento) from lancamento l where l.seq_categoria is not null and l.ind_acompanhamento = 0 and l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 4 and l.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Abril',
            (select sum(l.val_lancamento) from lancamento l where l.seq_categoria is not null and l.ind_acompanhamento = 0 and l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 5 and l.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Maio',
            (select sum(l.val_lancamento) from lancamento l where l.seq_categoria is not null and l.ind_acompanhamento = 0 and l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 6 and l.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Junho',
            (select sum(l.val_lancamento) from lancamento l where l.seq_categoria is not null and l.ind_acompanhamento = 0 and l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 7 and l.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Julho',
            (select sum(l.val_lancamento) from lancamento l where l.seq_categoria is not null and l.ind_acompanhamento = 0 and l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 8 and l.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Agosto',
            (select sum(l.val_lancamento) from lancamento l where l.seq_categoria is not null and l.ind_acompanhamento = 0 and l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 9 and l.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Setembro',
            (select sum(l.val_lancamento) from lancamento l where l.seq_categoria is not null and l.ind_acompanhamento = 0 and l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 10 and l.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Outubro',
            (select sum(l.val_lancamento) from lancamento l where l.seq_categoria is not null and l.ind_acompanhamento = 0 and l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 11 and l.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Novembro',
            (select sum(l.val_lancamento) from lancamento l where l.seq_categoria is not null and l.ind_acompanhamento = 0 and l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 12 and l.seq_usuario = '".$_SESSION["seq_usuario"]."') as 'Dezembro')
            union
            (SELECT 'Valor da sua hora trabalhada' as tip_classificacao,
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 1 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) /168 as 'Janeiro',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 2 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) /168 as 'Fevereiro',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 3 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) /168 as 'Marco',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 4 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) /168 as 'Abril',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 5 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) /168 as 'Maio',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 6 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) /168 as 'Junho',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 7 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) /168 as 'Julho',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 8 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) /168 as 'Agosto',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 9 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) /168 as 'Setembro',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 10 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) /168 as 'Outubro',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 11 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) /168 as 'Novembro',
            (select sum(l.val_lancamento) from lancamento l inner join categoria c on l.seq_categoria = c.id where l.ano_lancamento = '".$parametro[0]."' and l.mes_lancamento = 12 and l.seq_usuario = cat.seq_usuario and c.tip_grupo = cg.tip_grupo) /168 as 'Dezembro'
            from categoria_grupo cg
            inner join categoria cat
            on cg.tip_grupo = cat.tip_grupo
            where cat.seq_usuario = '".$_SESSION["seq_usuario"]."'
             and tip_classificacao = 'R'
            group by cg.tip_classificacao
            order by cg.tip_classificacao desc)");


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
      and l.seq_usuario = '".$_SESSION["seq_usuario"]."' 
      and l.mes_lancamento = trim('".$parametro[1] ."')
      and l.seq_categoria =trim('".$parametro[2] ."')  ");

define("LISTAR_VALORES_DETALHES_NULOS", "
select l.id, l.txt_lancamento, l.dat_lancamento, l.txt_lancamento, l.tip_origem ,l.val_lancamento
  from lancamento l
    where   
    l.ano_lancamento = trim('".$parametro[0]."')
      and l.seq_usuario = '".$_SESSION["seq_usuario"]."' 
      and l.mes_lancamento = trim('".$parametro[1] ."')
      and l.seq_categoria is null  ");

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


///////// INCLLUSAO DE NOVOS REGISTROS ////////////////////////////////////////////////

define("INCLUIR_CATEGORIAS", "INSERT INTO `categoria` (`nom_categoria`, `txt_categoria`, `ind_categoria`, `tip_grupo`, `seq_usuario`) VALUES
                                                    ( 'Alimentacao', '', 'D', 'ALI', '".$_SESSION["seq_usuario"]."'),
                                                    ( 'Cartão de Crédito', '', 'D', 'MOV', '".$_SESSION["seq_usuario"]."'),
                                                    ( 'Celular/TV/Internet', 'Sugestão de gastos para esta categoria', 'D', 'PES', '".$_SESSION["seq_usuario"]."'),
                                                    ( 'Cinema/Passeio', '', 'D', 'LAZ', '".$_SESSION["seq_usuario"]."'),
                                                    ( 'Combustivel', '', 'D', 'TRA', '".$_SESSION["seq_usuario"]."'),
                                                    ( 'Dentista', 'Sugestão de gastos para esta categoria', 'D', 'SAU', '".$_SESSION["seq_usuario"]."'),
                                                    ( 'Educação/Cursos', 'Sugestão de gastos para esta categoria', 'D', 'PES', '".$_SESSION["seq_usuario"]."'),
                                                    ( 'Estacionamento', '', 'D', 'TRA', '".$_SESSION["seq_usuario"]."'),
                                                    ( 'Farmácia', '', 'D', 'SAU', '".$_SESSION["seq_usuario"]."'),
                                                    ( 'Lazer', '', 'D', 'LAZ', '".$_SESSION["seq_usuario"]."'),
                                                    ( 'Manutenção', '', 'D', 'TRA', '".$_SESSION["seq_usuario"]."'),
                                                    ( 'Poupança', '', 'I', 'INV', '".$_SESSION["seq_usuario"]."'),
                                                    ( 'Salário', '', 'R', 'ENT', '".$_SESSION["seq_usuario"]."'),
                                                    ( 'Tarifas Bancarias', '', 'D', 'TAX', '".$_SESSION["seq_usuario"]."'),
                                                    ( 'Vestuário/Beleza', 'Sugestão de gastos para esta categoria', 'D', 'PES', '".$_SESSION["seq_usuario"]."');");

define("INCLUIR_REGRAS","insert into regra (des_regra,seq_usuario,seq_categoria)
          select * from (SELECT des_regra, '".$_SESSION["seq_usuario"]."' as seq_usuario, (select id from categoria where nom_categoria = 'Alimentacao' and seq_usuario = '".$_SESSION["seq_usuario"]."') as seq_categoria FROM `regra` WHERE `seq_categoria` = 117 union
                         SELECT des_regra, '".$_SESSION["seq_usuario"]."' as seq_usuario, (select id from categoria where nom_categoria = 'Cartão de Crédito' and seq_usuario = '".$_SESSION["seq_usuario"]."') as seq_categoria FROM `regra` WHERE `seq_categoria` = 131 union
                         SELECT des_regra, '".$_SESSION["seq_usuario"]."' as seq_usuario, (select id from categoria where nom_categoria = 'Celular/TV/Internet' and seq_usuario = '".$_SESSION["seq_usuario"]."') as seq_categoria FROM `regra` WHERE `seq_categoria` = 221 or `seq_categoria` = 212 or `seq_categoria` = 125  union
                         SELECT des_regra, '".$_SESSION["seq_usuario"]."' as seq_usuario, (select id from categoria where nom_categoria = 'Cinema/Passeio' and seq_usuario = '".$_SESSION["seq_usuario"]."') as seq_categoria FROM `regra` WHERE `seq_categoria` = 236 or `seq_categoria` =  243 union
                         SELECT des_regra, '".$_SESSION["seq_usuario"]."' as seq_usuario, (select id from categoria where nom_categoria = 'Combustivel' and seq_usuario = '".$_SESSION["seq_usuario"]."') as seq_categoria FROM `regra` WHERE `seq_categoria` = 303 or `seq_categoria` = 207 union
                         SELECT des_regra, '".$_SESSION["seq_usuario"]."' as seq_usuario, (select id from categoria where nom_categoria = 'Dentista' and seq_usuario = '".$_SESSION["seq_usuario"]."') as seq_categoria FROM `regra` WHERE `seq_categoria` = 215 union
                         SELECT des_regra, '".$_SESSION["seq_usuario"]."' as seq_usuario, (select id from categoria where nom_categoria = 'Educação/Cursos' and seq_usuario = '".$_SESSION["seq_usuario"]."') as seq_categoria FROM `regra` WHERE `seq_categoria` = 128 or  `seq_categoria` = 305 union
                         SELECT des_regra, '".$_SESSION["seq_usuario"]."' as seq_usuario, (select id from categoria where nom_categoria = 'Estacionamento' and seq_usuario = '".$_SESSION["seq_usuario"]."') as seq_categoria FROM `regra` WHERE `seq_categoria` = 306 or `seq_categoria` = 135 union
                         SELECT des_regra, '".$_SESSION["seq_usuario"]."' as seq_usuario, (select id from categoria where nom_categoria = 'Farmácia' and seq_usuario = '".$_SESSION["seq_usuario"]."') as seq_categoria FROM `regra` WHERE `seq_categoria` = 244 union
                         SELECT des_regra, '".$_SESSION["seq_usuario"]."' as seq_usuario, (select id from categoria where nom_categoria = 'Lazer' and seq_usuario = '".$_SESSION["seq_usuario"]."') as seq_categoria FROM `regra` WHERE `seq_categoria` = 243 or `seq_categoria` = 126 union
                         SELECT des_regra, '".$_SESSION["seq_usuario"]."' as seq_usuario, (select id from categoria where nom_categoria = 'Manutenção' and seq_usuario = '".$_SESSION["seq_usuario"]."') as seq_categoria FROM `regra` WHERE `seq_categoria` = 149 or `seq_categoria` =  298 union
                         SELECT des_regra, '".$_SESSION["seq_usuario"]."' as seq_usuario, (select id from categoria where nom_categoria = 'Poupança' and seq_usuario = '".$_SESSION["seq_usuario"]."') as seq_categoria FROM `regra` WHERE `seq_categoria` = 310 or `seq_categoria` = 249 union
                         SELECT des_regra, '".$_SESSION["seq_usuario"]."' as seq_usuario, (select id from categoria where nom_categoria = 'Salário' and seq_usuario = '".$_SESSION["seq_usuario"]."') as seq_categoria FROM `regra` WHERE `seq_categoria` = 230 union
                         SELECT des_regra, '".$_SESSION["seq_usuario"]."' as seq_usuario, (select id from categoria where nom_categoria = 'Tarifas Bancarias' and seq_usuario = '".$_SESSION["seq_usuario"]."') as seq_categoria FROM `regra` WHERE `seq_categoria` = 312 or `seq_categoria` = 120 union
                         SELECT des_regra, '".$_SESSION["seq_usuario"]."' as seq_usuario, (select id from categoria where nom_categoria = 'Vestuário/Beleza' and seq_usuario = '".$_SESSION["seq_usuario"]."') as seq_categoria FROM `regra` WHERE `seq_categoria` = 124 or `seq_categoria` = 313) as tabela");

define("INCLUIR_LANCAMENTO","INSERT INTO lancamento (`id`, `seq_usuario`, `mes_lancamento`, `ano_lancamento` ) VALUES ('".md5(date("l jS \of F Y h:i:s A").$_SESSION["seq_usuario"] )."', '".$_SESSION["seq_usuario"]."','12','2016')");