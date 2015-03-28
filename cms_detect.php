<?php
//CMS detection framework, v0.1
//https://github.com/ggtd/cms-detector
//=============================================
//author: Tomas Dobrotka
//web: www.dobrotka.sk
//contact: tomas@dobrotka.sk


class cms_detect{

    function __construct() {
        $this->cms="";
        $this->url="";
        $this->hitindex=0;

        $this->response_data = array();

    }


    function fetch($PATH,$KEY){
        $fetch_url=$this->url.$PATH;
        $fetch_data=file_get_contents($fetch_url);
        $this->response_data[$KEY]=$fetch_data;
    }

    function compare_hit($CMS_KEY,$DATA_KEY,$CONTENT,$HIT_VALUE){

        $tmp_pos=strpos($this->response_data[$DATA_KEY],$CONTENT);
        if ($tmp_pos>0){
            $this->hit[$CMS_KEY]=$this->hit[$CMS_KEY]+$HIT_VALUE;
        };
    }



    function go($URL){
        $this->url=$URL;

        $this->fetch('','root');
        $this->fetch('admin/','slash_admin');
        $this->fetch('administrator/','slash_administrator');
        $this->fetch('wp-admin/','slash_wp_admin');
        $this->fetch('adm/','slash_adm');

        //try hit Wordpresss fingerprints
        $this->compare_hit('wordpress','slash_wp_admin','wp-login.php',0.33);
        $this->compare_hit('wordpress','slash_wp_admin','wordpress',0.34);
        $this->compare_hit('wordpress','root','wp-content',0.34);

        //try hit WebsiteBaker fingerprints
        $this->compare_hit('websitebaker','slash_admin','www.websitebaker2.org',0.34);
        $this->compare_hit('websitebaker','slash_admin','WebsiteBaker',0.34);
        $this->compare_hit('websitebaker','slash_admin','username_fieldnam',0.34);

        //try hit phpBB fingerprints
        $this->compare_hit('phpbb','root','phpbb',0.34);
        $this->compare_hit('phpbb','slash_adm','phpBB',0.34);
        $this->compare_hit('phpbb','slash_adm','www.phpbb.',0.34);

        //try hit Joomla
        $this->compare_hit('joomla','slash_administrator','joomla.org',0.34);
        $this->compare_hit('joomla','slash_administrator','Joomla!',0.34);
        $this->compare_hit('joomla','slash_administrator','loginform',0.34);

        //try hit Drupal
        //try hit Magento
        //try hit Typo3
        //try hit PhpBB
        //try hit OpenCart
        //try hit OSCommerce
        //try hit ZenCart
        //try hit TinyCMS

        arsort($this->hit);
        $this->cms=key($this->hit);
        $this->hitindex=reset($this->hit);


    }

}
?>



