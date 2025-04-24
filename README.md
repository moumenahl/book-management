## Books management Project analysis
1. Entities :
1.1 user
1.2 category 
1.3 book
----------------------------------------------------------------
2. Entity function :
2.1 User entity that adds categories and books 
2.2 The category entity to which the book belongs
2.3 The book entity that is added, viewed, or deleted by the user.
----------------------------------------------------------------
3. Project specification :
3.1 The user can add a specific category.
3.2 The user can view a specific category.
3.3 The user can soft delete a specific category.
3.4 The user can add a specific book.
3.5 The user can view a specific book.
3.6 The user can soft delete a specific book.
3.7 The user can force delete a specific book.
3.8 The user can force delete a specific category.
3.9 the user can view a list books.
3.10 the user can view a list categories.
3.11 the user can view a list trash categories.
3.12 the user can view a list trash books.
3.13 the user can restore a soecfic book from trash.
3.14 the user can restore a soecfic category from trash.
----------------------------------------------------------------
4. Define entity properties :
4.1 The user has an ID, name, email and password.
4.2 The category has an ID, name.   
4.3 The book has an identifier, title, author, and description , created_at , updated_at .
----------------------------------------------------------------
5. Relationship :
5.1 Each book belongs to one category.
5.2 Each category contains many books.