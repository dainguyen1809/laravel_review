<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StudentStatusEnum extends Enum
{
    public const STUDYING = 0;
    public const LEAVE = 1;
    public const STOP = 2;

    public static function getAllEnum()
    {
        return [
            'Studying' => self::STUDYING,
            'Leave' => self::LEAVE,
            'Stop' => self::STOP,
        ];
    }

    public static function getKeyByValue($value)
    {
        return array_search($value, self::getAllEnum(), true);

    }
}
