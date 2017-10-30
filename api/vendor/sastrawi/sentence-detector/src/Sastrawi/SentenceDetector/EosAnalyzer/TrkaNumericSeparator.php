<?php
/**
 * Sastrawi Sentence Detector (https://github.com/sastrawi/sentence-detector)
 *
 * @link      http://github.com/sastrawi/sentence-detector for the canonical source repository
 * @license   https://github.com/sastrawi/sentence-detector/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\SentenceDetector\EosAnalyzer;

use Sastrawi\Trka\Finder\NumberFinderFactory;

/**
 * Analyze wether an end of sentence character is part of a numeric
 *
 * @author Andy Librian
 */
class TrkaNumericSeparator implements AnalyzerInterface
{
    private $finder;

    private $lastText;

    private $lastResult = array();

    public function __construct()
    {
        $factory = new NumberFinderFactory();
        $this->finder = $factory->create();
    }

    /**
     * {@inheritdoc}
     */
    public function shouldSplit(Model $model)
    {
        if ($this->lastResult === null || $this->lastText !== $model->getText()) {
            $this->lastResult = $this->finder->find($model->getText());
            $this->lastText   = $model->getText();
        }

        foreach ($this->lastResult as $span) {
            if ($span->containsIndex($model->getPosition())) {
                return false;
            }
        }

        return true;
    }
}
