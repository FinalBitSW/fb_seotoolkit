<?php

/*
 * This file is part of the "FinalBit SEO ToolKit" module.
 *
 * @author   FinalBit <service@finalbit.ch>
 * @source   https://github.com/FinalBitSW/fb_seotoolkit.git
 * @license  MIT
 *
 *
 * The MIT License (MIT)
 *
 * Copyright (c) 2018 FinalBit
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

if (!defined('_PS_VERSION_')) {
    exit;
}

function upgrade_module_1_4_0($module)
{
    Configuration::deleteByName('FBSEOTOOLKIT_HREFLANG_ENABLED');
    Configuration::deleteByName('FBSEOTOOLKIT_CANONICAL_ENABLED');
    Configuration::deleteByName('FBSEOTOOLKIT_NOBOTS_ENABLED');

    Db::getInstance()->delete('module', "`name` = 'fb_seotoolkit'", 1);
    Db::getInstance()->delete('module_preference', "`module` = 'fb_seotoolkit'");
    Db::getInstance()->delete('configuration', "`name` LIKE 'fb_seotoolkit%'");
    Db::getInstance()->delete('quick_access', "`link` LIKE '%module_name=fb_seotoolkit%'");

    return true;
}
