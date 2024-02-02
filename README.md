# Memotest
## System Requirements

Make sure you have the following installed before getting started:

- PHP >= 8.3.2
- Composer
- MySQL or any other database management system compatible with Laravel
- [Laravel](https://laravel.com/) installed globally

## Project Setup

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/nicopenaloza/memotest-backend.git
   cd memotest-backend
   ```

2. **Install Dependencies:**

   ```bash
   composer install
   ```

3. **Configure the Environment:**

   - Copy the `.env.example` file and rename it to `.env`.
   - Configure your database and other settings in the `.env` file.

4. **Generate the Application Key:**

   ```bash
   php artisan key:generate
   ```

5. **Run Migrations and Seeders:**

   ```bash
   php artisan migrate --seed
   ```

6. **Start the Development Server:**

   ```bash
   php artisan serve
   ```

   The server will be available at [http://localhost:8000](http://localhost:8000).

## Run Lighthouse

1. **Install Lighthouse:**

   ```bash
   composer require nuwave/lighthouse
   ```

2. **Publish Lighthouse Configuration:**

   ```bash
   php artisan vendor:publish --tag=lighthouse-config
   ```

3. **Run Lighthouse Migration:**

   ```bash
   php artisan migrate
   ```

4. **Start the GraphQL Server:**

   ```bash
   php artisan serve
   ```

   The GraphQL server will be available at [http://localhost:8000/graphql](http://localhost:8000/graphql).


## API Documentation

The GraphQL API documentation generated by Lighthouse will be available at [http://localhost:8000/graphql](http://localhost:8000/graphql) when the server is running.


## Types

### Game
- **Fields:**
  - id: ID!
  - name: String!
  - image: String!
  - gameCards: [GameCard!]! @hasMany
  - gameSessions: [GameSession!]! @hasMany

### GameCard
- **Fields:**
  - id: ID!
  - image: String!
  - game_id: ID!
  - game: Game @belongsTo

### GameSession
- **Fields:**
  - id: ID!
  - game_id: ID!
  - game: Game! @belongsTo
  - points: Int!
  - retries: Int!
  - state: GameState
  - numberOfPairs: Int!
  - cards: [CardSession]
  - updated_at: String!

### GameState
- **Fields:**
  - id: ID!
  - name: String!

### CardSession
- **Fields:**
  - id: ID!
  - card: GameCard!
  - session: GameSession!
  - active: Boolean!
  - hidden: Boolean!

## Mutations

1. **createMemo**
   - **Arguments:** name, image, images
   - **Returns:** Created Game

2. **deleteMemo**
   - **Arguments:** id
   - **Returns:** Deleted Game

3. **removeImage**
   - **Arguments:** id
   - **Returns:** Removed Image from GameCard

4. **createImage**
   - **Arguments:** game_id, image
   - **Returns:** Created GameCard

5. **createGameSession**
   - **Arguments:** game_id
   - **Returns:** Created GameSession

6. **endGameSession**
   - **Arguments:** id
   - **Returns:** Ended GameSession

7. **updateAttempts**
   - **Arguments:** id
   - **Returns:** Updated GameSession

8. **matchPair**
   - **Arguments:** session_id, card_id
   - **Returns:** Updated CardSession array

## Queries

1. **retrieveMemoTests**
   - **Arguments:** name (optional)
   - **Returns:** Array of Games
   - **Pagination:** Default count of 4
   - **Order By:** Updated_at (Descending)

2. **retrieveMemoTest**
   - **Arguments:** id
   - **Returns:** Single Game

3. **retrieveGameSession**
   - **Arguments:** id
   - **Returns:** Single GameSession

4. **retrieveGameSessions**
   - **Arguments:** page
   - **Returns:** Array of GameSessions
   - **Pagination:** Default count of 4

This schema provides a foundation for managing memory card games, including creating and deleting games, managing game sessions, and querying game data. It also incorporates features like pagination and ordering for enhanced functionality.

## Additional Notes

- You can customize the Lighthouse configuration according to your needs in the `config/lighthouse.php` file.
- Make sure to check the [official Lighthouse documentation](https://lighthouse-php.com/) for more information on its features and configuration options.

Ready to go! Now you should have your Laravel project with Lighthouse configured and ready for development. If you encounter any issues or have questions, refer to the official documentation or seek help in the Laravel and Lighthouse communities. Good luck with your project!
