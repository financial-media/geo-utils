<?php

namespace FM\Geo\Tests;

use FM\Geo\PointUtils;

class PointUtilsTest extends \PHPUnit_Framework_TestCase
{
    public function testPointInPolygonAdvancedInside()
    {
        $path = '[[{"lat":53.344660918667,"lng":6.8857288596528},{"lat":53.341067860529,"lng":6.8856038314004},{"lat":53.338410433632,"lng":6.882508462087},{"lat":53.328529479032,"lng":6.8821654945255},{"lat":53.328347233429,"lng":6.8822097547484},{"lat":53.323308119011,"lng":6.8834333866307},{"lat":53.323121185466,"lng":6.8834787733818},{"lat":53.315935004525,"lng":6.8832292769183},{"lat":53.311424952652,"lng":6.8845732585803},{"lat":53.309717989398,"lng":6.8873070753071},{"lat":53.309590989749,"lng":6.8875104595831},{"lat":53.297913399255,"lng":6.887104148698},{"lat":53.297052519998,"lng":6.8840741706646},{"lat":53.29465415534,"lng":6.8599920484489},{"lat":53.296450730932,"lng":6.8600534061865},{"lat":53.296560680414,"lng":6.8510572152362},{"lat":53.290327352451,"lng":6.8463463392775},{"lat":53.290433305671,"lng":6.8375970633821},{"lat":53.290436271675,"lng":6.8373513803812},{"lat":53.29144281719,"lng":6.8283863853229},{"lat":53.297766845796,"lng":6.8255976875764},{"lat":53.295179312162,"lng":6.8165117865673},{"lat":53.297441399495,"lng":6.8141014395464},{"lat":53.297909857715,"lng":6.8136022399869},{"lat":53.305167337614,"lng":6.8078412431706},{"lat":53.306030139586,"lng":6.8108702883196},{"lat":53.315968277669,"lng":6.8037192246536},{"lat":53.316000061981,"lng":6.8036963474153},{"lat":53.317388192427,"lng":6.8037419721572},{"lat":53.320491556683,"lng":6.803843985046},{"lat":53.324067053527,"lng":6.8054624720681},{"lat":53.325842439954,"lng":6.8070189603679},{"lat":53.325845932754,"lng":6.8070220234238},{"lat":53.326708744297,"lng":6.8100525097329},{"lat":53.326655378111,"lng":6.8145538244857},{"lat":53.327446430165,"lng":6.823586363581},{"lat":53.327345374961,"lng":6.8320185144711},{"lat":53.327338515506,"lng":6.832589090783},{"lat":53.327320464205,"lng":6.8340895402909},{"lat":53.327970233983,"lng":6.8357907324305},{"lat":53.329062767312,"lng":6.838651405615},{"lat":53.330859335484,"lng":6.8387119368385},{"lat":53.337201597007,"lng":6.8344214699698},{"lat":53.341711068325,"lng":6.8330714548914},{"lat":53.343489572236,"lng":6.834632788708},{"lat":53.345268054327,"lng":6.8361942519884},{"lat":53.345195548498,"lng":6.8421985316439},{"lat":53.345104494768,"lng":6.8497038485905},{"lat":53.343179687613,"lng":6.8601497776232},{"lat":53.342244602653,"lng":6.8631209614903},{"lat":53.342207715838,"lng":6.8661228640082},{"lat":53.343013439693,"lng":6.873658600568},{"lat":53.347486210405,"lng":6.87531478249},{"lat":53.3447680108,"lng":6.8853342015848},{"lat":53.344660918667,"lng":6.8857288596528}]]';
        $points = current(json_decode($path, true));

        // just inside
        $point = reset($points);
        $point['lat'] -= 0.00000000001;
        $point['lng'] -= 0.00000000001;

        $inPoly = PointUtils::pointInPolygon(array($point['lat'],$point['lng']), $points);
        $this->assertTrue($inPoly);

        // significant offset
        $point = reset($points);
        $point['lat'] -= 0.0000000002;
        $point['lng'] -= 0.0000000002;

        $inPoly = PointUtils::pointInPolygon(array($point['lat'],$point['lng']), $points);
        $this->assertTrue($inPoly);
    }

    public function testPointInPolygonAdvancedOutside()
    {
        $path = '[[{"lat":53.344660918667,"lng":6.8857288596528},{"lat":53.341067860529,"lng":6.8856038314004},{"lat":53.338410433632,"lng":6.882508462087},{"lat":53.328529479032,"lng":6.8821654945255},{"lat":53.328347233429,"lng":6.8822097547484},{"lat":53.323308119011,"lng":6.8834333866307},{"lat":53.323121185466,"lng":6.8834787733818},{"lat":53.315935004525,"lng":6.8832292769183},{"lat":53.311424952652,"lng":6.8845732585803},{"lat":53.309717989398,"lng":6.8873070753071},{"lat":53.309590989749,"lng":6.8875104595831},{"lat":53.297913399255,"lng":6.887104148698},{"lat":53.297052519998,"lng":6.8840741706646},{"lat":53.29465415534,"lng":6.8599920484489},{"lat":53.296450730932,"lng":6.8600534061865},{"lat":53.296560680414,"lng":6.8510572152362},{"lat":53.290327352451,"lng":6.8463463392775},{"lat":53.290433305671,"lng":6.8375970633821},{"lat":53.290436271675,"lng":6.8373513803812},{"lat":53.29144281719,"lng":6.8283863853229},{"lat":53.297766845796,"lng":6.8255976875764},{"lat":53.295179312162,"lng":6.8165117865673},{"lat":53.297441399495,"lng":6.8141014395464},{"lat":53.297909857715,"lng":6.8136022399869},{"lat":53.305167337614,"lng":6.8078412431706},{"lat":53.306030139586,"lng":6.8108702883196},{"lat":53.315968277669,"lng":6.8037192246536},{"lat":53.316000061981,"lng":6.8036963474153},{"lat":53.317388192427,"lng":6.8037419721572},{"lat":53.320491556683,"lng":6.803843985046},{"lat":53.324067053527,"lng":6.8054624720681},{"lat":53.325842439954,"lng":6.8070189603679},{"lat":53.325845932754,"lng":6.8070220234238},{"lat":53.326708744297,"lng":6.8100525097329},{"lat":53.326655378111,"lng":6.8145538244857},{"lat":53.327446430165,"lng":6.823586363581},{"lat":53.327345374961,"lng":6.8320185144711},{"lat":53.327338515506,"lng":6.832589090783},{"lat":53.327320464205,"lng":6.8340895402909},{"lat":53.327970233983,"lng":6.8357907324305},{"lat":53.329062767312,"lng":6.838651405615},{"lat":53.330859335484,"lng":6.8387119368385},{"lat":53.337201597007,"lng":6.8344214699698},{"lat":53.341711068325,"lng":6.8330714548914},{"lat":53.343489572236,"lng":6.834632788708},{"lat":53.345268054327,"lng":6.8361942519884},{"lat":53.345195548498,"lng":6.8421985316439},{"lat":53.345104494768,"lng":6.8497038485905},{"lat":53.343179687613,"lng":6.8601497776232},{"lat":53.342244602653,"lng":6.8631209614903},{"lat":53.342207715838,"lng":6.8661228640082},{"lat":53.343013439693,"lng":6.873658600568},{"lat":53.347486210405,"lng":6.87531478249},{"lat":53.3447680108,"lng":6.8853342015848},{"lat":53.344660918667,"lng":6.8857288596528}]]';
        $points = current(json_decode($path, true));

        // point almost on the moon
        $point = reset($points);
        $point['lat'] += 0.000002;
        $point['lng'] += 0.000002;

        $inPoly = PointUtils::pointInPolygon(array($point['lat'],$point['lng']), $points);
        $this->assertFalse($inPoly);
    }

    public function testPointInPolygonSimpleInside()
    {
        $points = array(
            array(0,0),
            array(2,0),
            array(2,2),
            array(0,2),
            array(0,0)
        );
        $inPoly = PointUtils::pointInPolygon(array(1,1), $points);
        $this->assertTrue($inPoly);
    }

    public function testPointInPolygonSimpleOutside()
    {
        $points = array(
            array(0,0),
            array(2,0),
            array(2,2),
            array(0,2),
            array(0,0)
        );
        $inPoly = PointUtils::pointInPolygon(array(1,3), $points);
        $this->assertFalse($inPoly, "1,3 outside");

        $inPoly = PointUtils::pointInPolygon(array(-1,0), $points);
        $this->assertFalse($inPoly, "-1,0 outside");

        $inPoly = PointUtils::pointInPolygon(array(2.1,0), $points);
        $this->assertFalse($inPoly, "2.1,0 outside");
    }
}
