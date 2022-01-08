<?php

require_once 'unittests/selenium/SeleniumTest.php';

class LanguageSelectTest extends SeleniumTest
{

    
    private function selectLangauge( $lang )
    {
        $this->waitForCSS(".language-dropdown-toggle")->click();
        $this->waitForCSS("#toplangdropdown > a[data-id='".$lang."']")->click();
//        sleep(5);
    }

    private function pageText()
    {
        return $this->byCssSelector("#page .core p")->text();
    }
        
    public function testLanguageSelect()
    {
        extract($this->getKeyBindings());
        $this->setupUnauthenticated();

        $this->selectLangauge( 'nl-nl' );
        $this->assertContains( 'FileSender is een veilige manier om bestanden te delen met iedereen!',
                               $this->pageText());

        $this->selectLangauge( 'en-us' );
        $this->assertContains( 'FileSender is a secure way to share large files with anyone!',
                               $this->pageText());

    }

}
