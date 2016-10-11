Objective-C CLI Obfuscator for Methods,IVars,Classes
===========================================
This is fork of fork of original [class-dump](https://github.com/nygard/class-dump) I have improved obfuscation which makes all obfuscated items the same lenght with random characters so analyzing binary is much harder than in previous fork. It also contains few fixes.

How it works ?
It works by generating a special set of `#define` statements (e.g. `#define createArray y09FYzLXv7T`) that automatically rename symbols during compilation.

How to use ?
1.Download and build this project and copy generated binary to `/usr/local/bin`
2.Make sure your project have [PrefixHeader](https://stackoverflow.com/questions/24158648/why-isnt-projectname-prefix-pch-created-automatically-in-xcode-6) generated.
3.Build your application
4.Take your *.app direcrtly from Products directory from Xcode
5.`ppios-rename --analyze --symbols-map symbols.map YOUR_APP.app`
6.Move symbols.map to your project directory to subfolder with all classes
7.Backup storyboards in separate directory
8.cd to this directory and run `ppios-rename --obfuscate-sources --symbols-map symbols.map`

Done.

Optionaly, if you want to make a little mess in code. You can optionally use `method_tree.php` PHP CLI tool
`Valid options:
code - generates obj-c code
list PREFIX - generates list of methods`
It can generate huge tree of methods which each one will return previous one, then the last one can do the job you want.
