# Statamic Socialize Buttons ![Statamic 3](https://img.shields.io/badge/statamic-3-blue.svg?style=flat-square)

🤩 **Simple and configurable social sharing buttons for Statamic** 🤩

Easily add and configure social sharing intent buttons to your Statamic site.

The following are supported (more coming soon!):

- Twitter
- Facebook
- Email

## Requirements

- Statamic 3

## Installation

Require the package with composer:

```
composer require austenc/socialize
```

## How to Use

- In the Statamic Control Panel, click on the **Socialize** option under **Tools**. Next, toggle the buttons you'd like to enable and change any default settings.
- Add `{{ socialize:css }}` to the `<head>` tag of your layout to pull in the CSS
- Use the `{{ socialize }}` tag where you want the buttons to appear

### Changing the Layout

You can also use a "sticky" button layout on the top, right, bottom or left by passing in the `layout` parameter like so:

```
{{ socialize layout="top" }}
```

```
{{ socialize layout="right" }}
```

```
{{ socialize layout="bottom" }}
```

```
{{ socialize layout="left" }}
```

## Changelog

### 1.0.0

- Initial version which adds support for Twitter, Facebook and Email share buttons

## Roadmap

> The following are planned features or user suggestions. All PRs will be considered, so feel free to open one!

- [ ] Write tests to verify the button URLs are generated correctly
- [ ] Can it cache settings in the stache instead of reading YAML file every time?
  - [ ] Is it as simple as using Laravel's caching stuff?
- [ ] Add Behance support
- [ ] Add Pinterest support
- [ ] Sharing counts
- [ ] Easier theme customization

## Support

Find a bug? Have a feature request? I'd be happy to help! Open an issue [on github](https://github.com/austenc/socialize)
or reach out on twitter [@austencam](https://twitter.com/austencam) with suggestions!
