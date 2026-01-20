# Restaurant Menu WordPress Theme

A complete, professional WordPress theme for restaurants, cafes, and food businesses to display their menu items in an elegant, organized way.

## Features

✅ **Custom Post Type for Menu Items** - Easily add and manage menu items
✅ **Food Categories** - Organize items by category (Appetizers, Mains, Desserts, etc.)
✅ **Price Management** - Add prices for each menu item
✅ **Ingredients List** - Display detailed ingredients for each item
✅ **Featured Images** - Beautiful thumbnail images for menu items
✅ **Responsive Design** - Works perfectly on mobile, tablet, and desktop
✅ **Professional Styling** - Elegant, restaurant-worthy design
✅ **Multiple Templates** - Archive, single item, and menu display pages
✅ **SEO Friendly** - Built with WordPress best practices

## Installation

1. **Upload the theme** to `/wp-content/themes/WordPress-Advanced/`
2. **Activate the theme** in WordPress Dashboard → Appearance → Themes
3. **Navigate to Settings → Permalinks** and save to refresh rewrite rules

## Getting Started

### Step 1: Create Food Categories
1. Go to **Menu Items → Food Categories** in the WordPress dashboard
2. Click **Add New Category**
3. Create categories like:
   - Appetizers
   - Main Courses
   - Desserts
   - Beverages
   - Specials

### Step 2: Add Menu Items
1. Go to **Menu Items → Add New**
2. Fill in the following:
   - **Title**: The name of the dish (e.g., "Grilled Salmon")
   - **Featured Image**: Upload a food photo
   - **Description**: Add a short description of the dish
   - **Category**: Assign it to a food category
   - **Price**: Enter the price in the "Price" meta box
   - **Ingredients**: List ingredients in the "Ingredients" meta box

### Step 3: Create Menu Page
1. Go to **Pages → Add New**
2. Set the title (e.g., "Our Menu")
3. Select **Template: Restaurant Menu** from the right sidebar
4. Publish the page

Your menu will now display all items organized by category!

## File Structure

```
WordPress-Advanced/
├── functions.php              # Theme configuration & custom post types
├── header.php                 # Header template
├── footer.php                 # Footer template
├── index.php                  # Main page template
├── menu.php                   # Restaurant menu page template
├── single-menu_item.php       # Single menu item template
├── archive-menu_item.php      # Menu items archive template
├── style.css                  # Main stylesheet
├── css/
│   └── restaurant-menu.css   # Restaurant-specific styling
├── js/
│   └── dropdown.js           # Navigation dropdown functionality
└── inc/
    └── customizer.php        # Theme customizer settings
```

## Custom Functions

The theme provides helper functions for developers:

### Get Menu Items by Category
```php
$items = get_menu_items_by_category('main-courses');
foreach ($items as $item) {
    echo $item->post_title;
    $price = get_post_meta($item->ID, '_menu_price', true);
    echo 'Price: $' . $price;
}
```

### Get All Food Categories
```php
$categories = get_all_food_categories();
foreach ($categories as $category) {
    echo $category->name;
    echo $category->description;
}
```

## Styling Classes

### Menu Item Classes
- `.menu-item` - Individual menu item container
- `.item-title` - Menu item name
- `.item-description` - Item description
- `.item-price` - Item price
- `.item-ingredients` - Ingredients list
- `.item-image` - Food image

### Category Classes
- `.menu-category` - Category section
- `.category-title` - Category heading
- `.menu-items` - Grid of items in a category

### Archive Classes
- `.archive-menu` - Archive container
- `.menu-item-card` - Card in grid view
- `.card-image` - Card image
- `.card-content` - Card content area

## Customization

### Colors
Edit the main color (#d4af37 - gold) in:
- `css/restaurant-menu.css` - Search and replace `#d4af37`

### Fonts
Change fonts in the CSS files:
- Main font: Change `font-family` in `.menu-header h1` and `.item-title`
- Serif font: Georgia is used for elegant headings

### Layout
- **Items per row**: Edit `.menu-items` grid-template-columns in the CSS
- **Item width**: Adjust `minmax(300px, 1fr)` values

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance Tips

1. **Optimize Images**: Use optimized images (72 DPI, max 1200px width)
2. **Use Caching**: Install a caching plugin like WP Super Cache
3. **Lazy Load Images**: Consider using a lazy loading plugin
4. **Minify CSS**: Use a plugin like Autoptimize

## Security

The theme includes:
- Proper escaping: `esc_html()`, `esc_url()`, `esc_attr()`
- Sanitization: `sanitize_text_field()`, `sanitize_textarea_field()`
- Nonce verification for admin forms

## Support & Troubleshooting

### Menu not showing?
- Ensure you've created at least one Food Category
- Create at least one Menu Item and assign it to a category
- Check that permalinks are properly set

### Images not displaying?
- Ensure featured images are uploaded
- Check image file permissions
- Verify uploads folder is writable

### Styling issues?
- Clear your browser cache
- Disable other theme CSS
- Check for CSS conflicts

## Advanced Features

### Custom Meta Fields
Each menu item has custom meta fields:
- `_menu_price` - Item price
- `_menu_ingredients` - Ingredients list

### Taxonomies
- `food_category` - Organize items by type

### REST API Support
All custom fields are available via REST API for mobile apps or external integrations.

## Future Enhancements

Consider adding:
- Allergen information
- Dietary tags (Vegetarian, Gluten-free, etc.)
- Ratings/Reviews
- Ordering system integration
- Print-friendly menu
- PDF menu download

## License

Free to use and modify for your restaurant.

## Credits

Built with WordPress best practices and modern web standards.

---

**Questions or need help?** Review the code comments in functions.php for more details on how features work.
