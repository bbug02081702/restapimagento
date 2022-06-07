<?php
namespace Taimagento\Training\Console\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;


class StudentListCommand extends Command
{

    protected $learnCollection;
    protected $scopeConfig;

    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setName('command:taimagento:training');
        $this->setDescription('lenh cli');

        parent::configure();
    }
    //function configure de xac dinh ten, mo ta, tham so cho command

    public function __construct(
        \Taimagento\Training\Model\ResourceModel\Student\CollectionFactory $learnCollection,
        \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
        string $name = null
    )
    {
        $this->learnCollection = $learnCollection;
        $this->scopeConfig = $scopeConfig;
        parent::__construct($name);
    }

    /**
     * Execute the command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return null|int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $collection = $this->learnCollection->create();
        foreach ($collection as $coll) {
            $name = $this->slug($coll->getName());
            $id = $coll->getEntityId();
            $coll->setSlug($name.'-'.$id);
            $coll->save();
        }
        $output->writeln('hoan tat command');
    }
  // function excute se duoc thuc thi khi command chay
  
}