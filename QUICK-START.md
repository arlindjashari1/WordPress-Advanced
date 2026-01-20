# 🍽️ Restaurant Menu Theme - Quick Start Guide

## ⚡ Fast Setup (5 Minutes)

### 1. Load Sample Data (OPTIONAL)
Want to see the theme in action with sample data?

1. Go to: `http://yoursite.com/wp-content/themes/WordPress-Advanced/sample-data.php`
2. Click run (you'll see "✓ Sample data created successfully!")
3. **Delete the file** `sample-data.php` after running
4. Check the menu page to see beautiful restaurant data!

### 2. Create Your Own Menu (NO Sample Data)

**Step 1: Create Food Categories**
- Go to WordPress Dashboard
- Click: **Menu Items → Food Categories**
- Click: **+ Add New Category**
- Create your categories, e.g.:
  - Appetizers
  - Main Courses
  - Desserts
  - Drinks

**Step 2: Add Menu Items**
- Go to: **Menu Items → + Add New**
- Enter item name (e.g., "Grilled Salmon")
- Upload a food photo
- Write description
- Pick a category
- Scroll down and fill:
  - **Price**: 24.99
  - **Ingredients**: Salmon, Lemon, Garlic, Vegetables

**Step 3: Create Menu Page**
- Go to: **Pages → + Add New**
- Title: "Menu" (or whatever you like)
- On the right, find **Template** dropdown
- Select: **Restaurant Menu**
- Click: **Publish**
- View the page!

That's it! 🎉

---

## 📁 What Changed in Your Theme

### New Files Created:
- `menu.php` - Main menu display page
- `single-menu_item.php` - Individual item details
- `archive-menu_item.php` - All items grid view
- `css/restaurant-menu.css` - Professional styling
- `sample-data.php` - Sample data loader
- `README.md` - Full documentation
- `QUICK-START.md` - This file

### Updated Files:
- `functions.php` - Added custom post types and features

---

## 🎨 Customization Tips

### Change Gold Color to Your Brand Color
1. Open: `css/restaurant-menu.css`
2. Find: `#d4af37` (this is the gold color)
3. Replace with your color (e.g., `#FF6B35` for orange)
4. Save!

### Change Fonts
1. Open: `css/restaurant-menu.css`
2. Find: `font-family: Georgia, serif;`
3. Change to any Google Font or system font
4. Example: `font-family: 'Poppins', sans-serif;`

### Adjust Layout
Want more items per row?
1. Open: `css/restaurant-menu.css`
2. Find: `grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));`
3. Change `300px` to `250px` for 4 items, or `350px` for 2 items
4. Save!

---

## 🚀 Advanced Features

### Display Items by Category in Custom Post
```php
<?php
$items = get_menu_items_by_category('main-courses');
foreach ($items as $item) {
    echo '<h3>' . $item->post_title . '</h3>';
    echo '<p>' . $item->post_excerpt . '</p>';
    $price = get_post_meta($item->ID, '_menu_price', true);
    echo '<strong>$' . $price . '</strong>';
}
?>
```

### Show All Categories with Items
```php
<?php
$categories = get_all_food_categories();
foreach ($categories as $category) {
    echo '<h2>' . $category->name . '</h2>';
    $items = get_menu_items_by_category($category->slug);
    // Loop through items...
}
?>
```

---

## ❓ Troubleshooting

### Menu page is blank?
- ✓ Created at least one Food Category?
- ✓ Created at least one Menu Item?
- ✓ Assigned the item to a category?
- ✓ Set the page template to "Restaurant Menu"?

### Items not showing images?
- ✓ Uploaded a featured image for each item?
- ✓ Featured images are in JPEG/PNG format?
- ✓ WordPress uploads folder has write permissions?

### Styling looks wrong?
- Clear your browser cache (Ctrl+Shift+Delete)
- Disable other plugins temporarily
- Check if another theme CSS is overriding

### Permalinks broken?
- Go to: **Settings → Permalinks**
- Click: **Save Changes**
- This refreshes WordPress URL rewrite rules

---

## 💡 Pro Tips

1. **Use High-Quality Images**
   - 400x300px minimum
   - Optimize before uploading (use TinyPNG)
   - JPEG format for photos

2. **Write Good Descriptions**
   - Be descriptive but concise
   - Mention special ingredients or preparation
   - Highlight unique selling points

3. **Update Regularly**
   - Add seasonal specials
   - Remove out-of-stock items
   - Update prices as needed

4. **Mobile Friendly**
   - Test menu on your phone
   - Images should load fast
   - Text should be readable

---

## 🔐 Security Note

All input is properly sanitized and escaped. The theme follows WordPress security best practices.

---

## 📱 Responsive Design

✅ Looks great on:
- Desktop computers
- Tablets
- Mobile phones
- All modern browsers

---

## 🎓 Next Level

### Add Allergen Information
Add to `single-menu_item.php`:
```php
<?php if ($allergens = get_post_meta(get_the_ID(), '_menu_allergens', true)) { ?>
    <p><strong>Allergens:</strong> <?php echo esc_html($allergens); ?></p>
<?php } ?>
```

### Add Vegetarian/Vegan Tags
Create another taxonomy for dietary options!

### Add Rating System
Install a ratings plugin and customize templates

### Enable Reviews
Allow customers to review dishes

---

## 📞 Need Help?

1. Check `README.md` for detailed documentation
2. Look at `functions.php` - code is well-commented
3. Check WordPress plugin directory for add-ons

---

## 🎉 You're All Set!

Your restaurant menu is ready to go live! 

**Next steps:**
1. Create your food categories
2. Add your menu items
3. Create the menu page
4. Share it with your customers!

Enjoy! 🍽️

---

**Questions?** Review the commented code in `functions.php` for implementation details.
