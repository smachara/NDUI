<?php

namespace smachara\GeneratorBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class smacharaGeneratorBundle extends Bundle
{
    public function getParent()
    {
        return 'SensioGeneratorBundle';
    }
}
