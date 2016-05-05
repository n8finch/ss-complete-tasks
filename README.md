# Dev Application Nate Finch

Below are the solutions and explinations to tasks required to be a Support Star!

## 1. How's Your Code?

Plugin:

1. If this was a real client, I'd want to clarify exactly what they want in the number, where they want it and if it should be consistent. I opted for a random number with the appended user ID. 
2. Since it was not clear exactly what the client wanted in a shortcode, I just added the ability for them to add a "Bottom Line" short code to whatever piece of content they like. If they use the shortcode `[bottom-line]` add some content and close the content with `[/bottom-line]`, that content will be highlighted with light gray and a red left border, and titled "The Bottom Line". The short code could be whatever they want, but this was a quick solution for this task.
3. Again, since this wasn't too specific, the function I created was a Metabox that asks for the mood of the person when they're writing it. It assumes they're using a sidebar on the front end, and the "Current Mood" status is displayed over the sidebar of the current post. 

This is all found in the `how-is-your-code` folder, which can be compressed and then uploaded as a plugin.


## 2. And what about your theming?

Three approaches: 

1. Copy and Paste the following CSS onto the bottom of their style sheet (either through the wp-admin Editor, or through FTP): 

```
/**
 * Remove the Title and Logo, Center Menu
 */

#header-left {
    display: none !important;
}

#hgroup-wrap {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
}
```

2. I've added this to the `what-about-your-theming` plugin folder. I would basically send them the .zip version of this folder and have them upload it as a plugin. As long as it's active, it should override the other styles. That way they don't have to edit their CSS if they don't want to, and they can just upload it as a plugin. Since the styles are pretty theme specific, they shouldn't transfer to other themes, should they decide to change themes.

3. The third approach is (since I had access to this theme and could test it), create a child theme and hid the header Image and Title, and add the styles to move the menu to center. This way, they can just upload the child theme via the Themes menu (like they've probably done before), activate it, and continue to update their old theme without any consequences.


## 3. Something simple, really?

See the markdown document in the task 3 folder for the explanation. 



## 4. Some more style, please!

I'm assuming the logo is set through the customizer or Apperances area, since it's an inline logo. This can be changed to the WordPress logo in the backend admin, then.

Again, two approaches: 

1. Copy and Paste the following CSS onto the bottom of their style sheet (either through the wp-admin Editor, or through FTP): 

```
/**
 * Add styles to the theme
 */

body {
    background: #000000;
}

#top-navigation-bar {
    background: #6296f0;
    border-top: 1px solid #000;
    border-bottom: 1px solid #000;
}

.sf-menu li {
    background-color: #6296f0;
}

#topbar ul li a {
    color: #f3f76d;
}

img.full-logo {
    max-width: 75px;
}

a.button {
    background: #6296f0;
}

.generic-box {
    border-radius: 10px;
}

button#search-submit {
    background: #6296f0;
}

#discoveryBox .profileBox a {
    color: #6296f0;
}

.articles li {
    text-align: center;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 10px;
    width: 284px;
}

.articles .thumb {
    width: auto;
}

.articles li h3 a {
    color: #6296f0;
}
```

2. I've added this to the `some-more-styles-please` plugin folder. I would basically send them the .zip version of this folder and have them upload it as a plugin. As long as it's active, it should override the other styles. That way they don't have to edit their CSS if they don't want to, and they can just upload it as a plugin. Since the styles are pretty theme specific, they shouldn't transfer to other themes, should they decide to change themes.


***NOTE:*** I've namespaced the plugins in these tasks so they can be used on the same site, though I'm assuming they'll be used on different sites.