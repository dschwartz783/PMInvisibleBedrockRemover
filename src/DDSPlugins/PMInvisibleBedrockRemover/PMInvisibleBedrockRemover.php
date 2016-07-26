<?php
/**
 * Created by PhpStorm.
 * User: funtimes
 * Date: 6/19/16
 * Time: 8:08 AM
 */

namespace DDSPlugins\PMInvisibleBedrockRemover;

use pocketmine\block\Block;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;

class PMInvisibleBedrockRemover extends PluginBase
{
    function onEnable()
    {
        $this->getLogger()->info("PMInvisibleBedrockRemover Enabled");
    }

    function onCommand(CommandSender $sender, Command $command, $label, array $args)
    {
        if ($sender instanceof Player) {
            $player_position = $sender->getPosition();
            $block_position = $player_position->add(0, -1, 0);
            if ($sender->getLevel()->getBlock($block_position)->getId() == Block::INVISIBLE_BEDROCK){
                $sender->getLevel()->setBlock($block_position, Block::get(Block::AIR));
            }
        }
        return true;
    }
}
