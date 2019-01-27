# getMiddleText

简单实用的文本截取函数

## 常量说明
```text
INCLUDING_NOTHING 不追加文本
INCLUDING_LEFT    追加左边文本
INCLUDING_RIGHT   追加右边文本
INCLUDING_BOTH    追加两边文本
```

## 函数说明
```text
/**
 * 取中间文本
 * @param  string         $wholeText 寻找文本
 * @param  string         $leftText  左边文本
 * @param  string         $rightText 右边文本
 * @param  int            $offset    开始查找位置
 * @param  int            &$position 返回第一个找到文本的位置，找不到返回-1
 * @param  int            $padding   填充
 * @return string|false
 */
function getMiddleText($wholeText, $leftText, $rightText, $offset = 0, &$position = 0, $padding = INCLUDING_NOTHING) {}

/**
 * 取中间文本组
 * @param  string     $wholeText 寻找文本
 * @param  string     $leftText  左边文本
 * @param  string     $rightText 右边文本
 * @param  int        $offset    开始查找位置
 * @param  int        &$position 返回最后找到文本的位置，找不到返回-1
 * @param  int        $padding   填充
 * @return string[]
 */
function getMiddleTexts($wholeText, $leftText, $rightText, $offset = 0, &$position = 0, $padding = INCLUDING_NOTHING) {}
```

## 测试文本
```html
<!DOCTYPE html>
<html>
<head>
    <title>TEST</title>
</head>
<body>
    <div>
        <article>
            <title>Hello World, 你好世界！</title>
            <author>LiesAuer</author>
            <content>Hello World, 你好世界！Hello World, 你好世界！</content>
        </article>
    </div>
</body>
</html>
```

## 快速入门
```php
getMiddleText($text, '<body>', '</body>');
```

结果
```text
    <div>
        <article>
            <title>Hello World, 你好世界！</title>
            <author>LiesAuer</author>
            <content>Hello World, 你好世界！Hello World, 你好世界！</content>
        </article>
    </div>
```

## 从指定位置开始查找（支持负数）
从指定位置开始查找能一定地提高效率
```php
getMiddleText($text, '<title>', '</title>', 10);
```

结果
```text
TEST
```

## 保存查找到的位置
保存查找到的位置，以供下次顺序查找，能一定地提高效率
```php
getMiddleText($text, '<title>', '</title>', 10，$pos);
getMiddleText($text, '<div>', '</div>', $pos, $pos, INCLUDING_BOTH);
```

结果
```text
<div>
        <article>
            <title>Hello World, 你好世界！</title>
            <author>LiesAuer</author>
            <content>Hello World, 你好世界！Hello World, 你好世界！</content>
        </article>
    </div>
```

## 从开头截取+追加右边文本
```php
getMiddleText($text, '', 'html>', 0, $pos, INCLUDING_RIGHT);
```

结果
```text
<!DOCTYPE html>
```

## 追加两边文本
```php
getMiddleText($text, '<div>', '</div>', 0, $pos, INCLUDING_BOTH);
```

结果
```text
<div>
        <article>
            <title>Hello World, 你好世界！</title>
            <author>LiesAuer</author>
            <content>Hello World, 你好世界！Hello World, 你好世界！</content>
        </article>
    </div>
```

## 截取到末尾+追加左边文本
```php
getMiddleText($text, '<html>', '', 0, $pos, INCLUDING_LEFT);
```

结果
```text
<html>
<head>
    <title>TEST</title>
</head>
<body>
    <div>
        <article>
            <title>Hello World, 你好世界！</title>
            <author>LiesAuer</author>
            <content>Hello World, 你好世界！Hello World, 你好世界！</content>
        </article>
    </div>
</body>
</html>
```

## 截取文本组
```php
getMiddleTexts($text, '<title>', '</title>');
```

结果
```text
[
  'TEST',
  'Hello World, 你好世界！',
]
```
