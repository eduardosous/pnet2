/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function(){
    $("#btn-criacao-ativado").click(function(){
        console.log("teste click");
        $('.criacao-de-sites-ativado').show();
        $('.identidade-visual-ativado').hide();
        
    });
    
    $("#btn-criacao-desativado").click(function(){
        console.log("teste click");
        $('.identidade-visual-ativado').hide();
        $('.identidade-visual-desativado').show();
        $('.criacao-de-sites-ativado').show();
        $('.criacao-de-sites-desativado').hide();
        $('.line-color-identidade').hide();
        $('.line-gray-identidade').show();
        $('.line-color-criacao').show();
        $('.line-gray-criacao').hide();
        $('.seta-gif-criacao').hide();
        $('.seta-gif-identidade').show();
        $('.conteudo-criacao-site').show();
        $('.conteudo-identidade-visual').hide();
    });

    $("#btn-identidade-ativado").click(function(){
        console.log("teste click");
        $('.criacao-de-sites-ativado').hide();
        $('.criacao-de-sites-desativado').show();
    });

    $("#btn-identidade-desativado").click(function(){
        console.log("teste click");
        $('.criacao-de-sites-ativado').hide();
        $('.criacao-de-sites-desativado').show();
        $('.identidade-visual-desativado').hide();
        $('.identidade-visual-ativado').show();
        $('.line-color-identidade').show();
        $('.line-gray-identidade').hide();
        $('.line-color-criacao').hide();
        $('.line-gray-criacao').show();
        $('.seta-gif-criacao').show();
        $('.seta-gif-identidade').hide();
        $('.conteudo-criacao-site').hide();
        $('.conteudo-identidade-visual').show();
    });
});