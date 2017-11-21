# FAQ

## Table of content
- [How can I bypass GrumPHP](#how-can-i-bypass-grumphp)
- [Which parts of the code does GrumPHP scan?](#which-parts-of-the-code-does-grumphp-scan)
- [Does GrumPHP support automatic fixing](#does-grumphp-support-automatic-fixing)
- [Does GrumPHP support Windows](#does-grumphp-support-windows)
- [How can I fix Composer require conflicts?](#how-can-i-fix-composer-require-conflicts)


## How can I bypass GrumPHP

You shouldn't! Its to maintain clean and well formatted code.
Don't make your co-worker pissed off again...

*Note: use `--no-verify` or `-n` flag when you commit, 
this will bypass the pre-commit and commit-msg*

[up](#table-of-content)


## Which parts of the code does GrumPHP scan

When running `./vendor/bin/grumphp run` all 
files in the repository will be scanned.
On pre-commit + commit-msg the changed files 
will be scanned.
Most tasks work directly with these files, 
but there are some commands like `git_blacklist` 
that are able to check only the committed lines.

[up](#table-of-content)


## Does GrumPHP support automatic fixing

No, he doesn't fix things for you. He wants you to have full
control of the code you commit and not manipulate it in any way.

[up](#table-of-content)


## Does GrumPHP support Windows

Yes, he does. But there are some limitations.

**PHPCS and PHPLint tasks fail on Windows 7**

This is due to the cmd input limit on windows.
The problem is that the CLI input string on cmd.exe 
is limited to 8191 characters. Tasks like phplint 
and phpcs contain the paths to the files that are 
being checked. During a run command, the list of 
files wil exceed this amount which results in some 
strange errors on windows.

[up](#table-of-content)


## How can I fix Composer require conflicts?

In some cases, you might get require conflicts between your project and GrumPHP for Composer packages.

For example, Magento 2 has the following requirement for `symfony/console`

    "symfony/console": "~2.3, !=2.7.0"
    
On the other hand, grumPHP has this requirement

    "symfony/console": "~2.7|~3.0"

If you run composer, you will get the following error message

    Your requirements could not be resolved to an installable set of packages.

You can resolve this problem by adding the following (or similar) to the composer.json file of your project

    "symfony/console": "v2.8.20 as v2.6.13"

[up](#table-of-content)
