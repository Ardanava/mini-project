<?php

namespace App\Controllers;

use jcobhams\NewsApi\NewsApi;


class Home extends BaseController
{
    public function index()
    {
        $newsapi = new NewsApi('b2a602b9854640039eab0d186074416b');  
        $top_headlines = $newsapi->getEverything($q='apple', null, null, null, null, null, $language='en', $sort_by='publishedAt',  '100', '1'); 
        if (!empty($top_headlines->articles)) {
            $valid_articles = []; // Array untuk menyimpan artikel yang valid        
            foreach ($top_headlines->articles as $article) {
                // Pastikan artikel memiliki ID dan judulnya bukan '[Removed]'
                if (isset($article->source->id) && $article->source->id !== '' && $article->urlToImage !== null && $article->title !== '[Removed]') {
                    $valid_articles[] = $article;                    
                }
            }
        }
        // var_dump($valid_articles); die();
        $berita_populer = $newsapi->getEverything($q='apple', null, null, null, null, null, $language='en', $sort_by='popularity',  '80', '1'); 
        // var_dump($berita_populer); die();    
        if (!empty($berita_populer->articles)) {
            $artikel_valid = [];
            foreach ($berita_populer->articles as $artikel) {
                if (!empty($artikel->source->id) && $artikel->source->id !== '' && $article->urlToImage !== null && $artikel->title !== '[Removed]') {
                    $artikel_valid[] = $artikel;                    
                }
            }
        }      
        // var_dump($artikel_valid); die();
        $kategori = $newsapi->getCategories();
        $data = [
            'title' => "WBLnews | Portal Berita Terkini",
            'berita' => $valid_articles,
            'populer' => $artikel_valid,
            'kategori' => $kategori,
        ];
        return view('template/header', $data)
            . view('halaman/index')
            . view('template/footer');
    }

    public function lengkap($slug){
        $newsapi = new NewsApi('b2a602b9854640039eab0d186074416b');
        $detail = $newsapi->getEverything($q='apple', $slug, null, null, null, null, $language='en', $sort_by='publishedAt',  '1', '1'); 
        $data = [
            'title' => "WBLnews | Portal Berita Terkini",
            'detail' => $detail,
        ];
        // var_dump($data); die();
        return view('template/header', $data)
            . view('halaman/lengkap')
            . view('template/footer');
    }
    public function cari(){
        $cari = $this->request->getPost('cari');
        $newsapi = new NewsApi('b2a602b9854640039eab0d186074416b');
        $top_headlines = $newsapi->getEverything($q=$cari, null, null, null, null, null, $language='en', $sort_by='publishedAt',  '100', '1'); 
        if (!empty($top_headlines->articles)) {
            $valid_articles = []; // Array untuk menyimpan artikel yang valid        
            foreach ($top_headlines->articles as $article) {
                // Pastikan artikel memiliki ID dan judulnya bukan '[Removed]'
                if (isset($article->source->id) && $article->source->id !== '' && $article->urlToImage !== null && $article->title !== '[Removed]') {
                    $valid_articles[] = $article;                    
                }
            }
        }

        $berita_populer = $newsapi->getEverything($q='apple', null, null, null, null, null, $language='en', $sort_by='popularity',  '80', '1'); 
        // var_dump($berita_populer); die();    
        if (!empty($berita_populer->articles)) {
            $artikel_valid = [];
            foreach ($berita_populer->articles as $artikel) {
                if (!empty($artikel->source->id) && $artikel->source->id !== '' && $artikel->urlToImage !== null && $artikel->title !== '[Removed]') {
                    $artikel_valid[] = $artikel;                    
                }
            }
        }    
        $kategori = $newsapi->getCategories();
        // var_dump($kategori);die();
        $data = [
            'title' => "WBLnews | Portal Berita Terkini",
            'hasil' => $valid_articles,
            'populer' => $artikel_valid,
            'cari' => $cari,
            'kategori' => $kategori,
        ];
        // var_dump($data); die();
        return view('template/header', $data)
            . view('halaman/cari')
            . view('template/footer');
    }
    public function kategori($kat){

        $newsapi = new NewsApi('b2a602b9854640039eab0d186074416b');
        $top_headlines = $newsapi->getTopHeadlines($q='', null, $country='us', $category=$kat, $page_size='30', $page='1');
        // var_dump($top_headlines); die();
        if (!empty($top_headlines->articles)) {
            $valid_articles = []; // Array untuk menyimpan artikel yang valid        
            foreach ($top_headlines->articles as $article) {
                // Pastikan artikel memiliki ID dan judulnya bukan '[Removed]'
                if (isset($article->source->id) && $article->source->id !== '' && $article->urlToImage !== null && $article->title !== '[Removed]') {
                    $valid_articles[] = $article;                    
                }
            }
        }
        // var_dump($valid_articles); die();
        $berita_populer = $newsapi->getEverything($q='apple', null, null, null, null, null, $language='en', $sort_by='popularity',  '80', '1'); 
        // var_dump($berita_populer); die();    
        if (!empty($berita_populer->articles)) {
            $artikel_valid = [];
            foreach ($berita_populer->articles as $artikel) {
                if (!empty($artikel->source->id) && $artikel->source->id !== '' && $artikel->urlToImage !== null && $artikel->title !== '[Removed]') {
                    $artikel_valid[] = $artikel;                    
                }
            }
        }    
         
       
        $kategori = $newsapi->getCategories();
        // var_dump($artikel_valid);die();
        $data = [
            'title' => "WBLnews | Portal Berita Terkini",
            'category' => $valid_articles,
            'populer' => $artikel_valid,
            'kat' => $kat,
            'kategori' => $kategori,
        ];
        return view('template/header', $data)
            . view('halaman/kategori')
            . view('template/footer');
    }
}
