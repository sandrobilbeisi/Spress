<?php

/*
 * This file is part of the Yosymfony\Spress.
 *
 * (c) YoSymfony <http://github.com/yosymfony>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yosymfony\Spress\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\ArrayInput;

/**
 * Welcome to Spress command
 *
 * @author Victor Puertas <vpgugr@gmail.com>
 */
class WelcomeCommand extends Command
{
    protected function configure()
    {
        $this->setName('welcome')
            ->setDescription('Welcome to Spress message');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            '',
            $this->getSpressAsciiArt(),
            '',
            'Hola user and welcome!',
            '',
            'More information at <comment>http://spress.yosymfony.com</comment> or <comment>@spress_cms</comment> on Twitter',
            '',
        ]);

        $command = $this->getApplication()->find('list');

        $arguments = new ArrayInput([
            'command' => 'list',
        ]);
        $command->run($arguments, $output);
    }

    protected function getSpressAsciiArt()
    {
        return <<<EOF
             (
     )\ )
    (()/(            (      (
     /(_))    `  )   )(    ))\ (   (
 __ (_))  __  /(/(  (()\  /((_))\  )\
| _|/ __||_ |((_)_\  ((_)(_)) ((_)((_)
| | \__ \ | || '_ \)| '_|/ -_)(_-<(_-<
| | |___/ | || .__/ |_|  \___|/__//__/
|__|     |__||_|
EOF;
    }
}
