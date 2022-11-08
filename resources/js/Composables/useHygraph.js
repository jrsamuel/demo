import { GraphQLClient } from 'graphql-request';
import { gql } from 'graphql-request';


export function useHygraph() {

    const hygraphClient = new GraphQLClient(
        'https://api-us-east-1.hygraph.com/v2/cl9c3mg4a4d7a01t6dbe9dr13/master'
    );


    return { client: hygraphClient, gql }

}
