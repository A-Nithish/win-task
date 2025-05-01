# win-task
Built RESTful APIs with full CRUD operations to manage resources efficiently using Laravel.

CRUD:
a) Project Setup: Created a new Laravel project and configured the environment and dependencies.

b) Database Migrations: Created tables for countries, states, and cities with proper foreign key relationships.

c)JSON File Setup: Added a structured JSON file with nested country, state, and city data into the storage directory.

d) Custom Import Command: Built an Artisan command to bulk import data from the JSON file into the database using efficient batch insertions.

e) Relationship Handling: Maintained correct foreign key relationships during import and avoided duplicate entries with validations and constraints.

CRUD Operations: Implemented create, read, update, and delete features for countries, states, and cities with proper linking and cascading deletes.

API:

a) CRUD Endpoints: Built API routes for creating, reading, updating, and deleting blog posts.

b) Validation & Authentication: Added request validation and secured all routes using Laravel Sanctum for token-based authentication.

c) Rate Limiting: Implemented Laravel's rate limiter with custom limits to prevent abuse and manage traffic per user/endpoint.

d) Token Management: Integrated Sanctum to generate, store, and revoke API tokens for authenticated users.

e) Eloquent Relationships: Established relationships between Users, Posts, and Comments with nested data returned in API responses.

f) Pagination: Used Laravel’s pagination for API responses with structured links and meta for easy frontend handling.
