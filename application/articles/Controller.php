<?php

class Controller {
    
    
    private $_page;
    private $_action;
    private $_view;
    private $_datas;
    
    
    public function __construct($page, $action) {
        
        $this->_page = $page;
        $this->_action = $action;
        $this->_setDatas ();
        $this->_view = $view;
    }
            
   private function _setDatas() {
        switch ( $this->_action )

 {
    case 'details' :
       
        $this->_datas = $this->_article($_GET['id']);
        
        break;
        
    case 'insert' :
     
        break;
    
    default :
        
        $this->_datas = $this->_articles ();
        
        
        
        break;
 }
        
    }
    

private function _articles()
{
    $datas = array();
    
    $db = Db::connect();

    $results = $db->query( 'SELECT * FROM articles' );

    if( !$db->errno && $results->num_rows > 0 )
    {
        $datas[ 'articles' ] = $results;
    }
    
    $datas[ 'view' ] = 'articles/article';
    
    return $datas;
}


private function _article( $id )
{
    $datas = array();
    
    $db = Db::connect();

    $results = $db->query( 'SELECT * FROM articles WHERE IdArticle = \''.$db->real_escape_string($id).'\'' );

    if( !$db->errno && $results->num_rows > 0 )
    {
        $datas[ 'article' ] = $results;
    }
    
    $datas[ 'view' ] = 'article/article_detail';
    
    return $datas;
}

public function get_datas()
        
{
    
    return $this->_datas;
}

 
       



 
 }