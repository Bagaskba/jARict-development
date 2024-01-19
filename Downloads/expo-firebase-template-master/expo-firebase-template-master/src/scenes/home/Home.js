import React, { useEffect, useState, useContext, useLayoutEffect } from 'react'
import {
  Text,
  View,
  ScrollView,
  StyleSheet,
  TouchableOpacity,
  Image,
} from 'react-native'
import { useNavigation } from '@react-navigation/native'
import IconButton from '../../components/IconButton'
import ScreenTemplate from '../../components/ScreenTemplate'
import Button from '../../components/Button'
import { firestore } from '../../firebase/config'
import { doc, onSnapshot } from 'firebase/firestore'
import { colors, fontSize } from '../../theme'
import { UserDataContext } from '../../context/UserDataContext'
import { ColorSchemeContext } from '../../context/ColorSchemeContext'
import { sendNotification } from '../../utils/SendNotification'
import { getKilobyteSize } from '../../utils/functions'
import Headerlogo from '../../components/Headerlogo'
import { logo, produk, reservasi } from '../../../assets'

export default function Home() {
  const navigation = useNavigation()
  const [token, setToken] = useState('')
  const { userData } = useContext(UserDataContext)
  const { scheme } = useContext(ColorSchemeContext)
  const isDark = scheme === 'dark'
  const colorScheme = {
    content: isDark ? styles.darkContent : styles.lightContent,
    text: isDark ? colors.white : colors.primaryText,
  }

  useEffect(() => {
    const str = 'Hello, こんにちは!'
    const kilobyteSize = getKilobyteSize({ str: str })
    console.log({ str, kilobyteSize })
  }, [])

  useEffect(() => {
    const obj = {
      name: 'name1',
      age: 15,
    }
    const kilobyteSize = getKilobyteSize({ str: obj })
    console.log({ obj, kilobyteSize })
  }, [])

  useEffect(() => {
    const array = ['name1', 'name2', 'name3']
    const kilobyteSize = getKilobyteSize({ str: array })
    console.log({ array, kilobyteSize })
  }, [])

  useLayoutEffect(() => {
    navigation.setOptions({
      headerRight: () => (
        <IconButton
          icon="align-right"
          color={colors.lightPurple}
          size={24}
          onPress={() => headerButtonPress()}
          containerStyle={{ paddingRight: 15 }}
        />
      ),
    })
  }, [navigation])

  const headerButtonPress = () => {
    alert('Tapped header button')
  }

  const onCardPress = () => {
    navigation.navigate('ProdukTab')
  }
  const onCard2Press = () => {
    navigation.navigate('Reservasi')
  }

  useEffect(() => {
    const tokensRef = doc(firestore, 'tokens', userData.id)
    const tokenListner = onSnapshot(tokensRef, (querySnapshot) => {
      if (querySnapshot.exists) {
        const data = querySnapshot.data()
        setToken(data)
      } else {
        console.log('No such document!')
      }
    })
    return () => tokenListner()
  }, [])

  return (
    <ScreenTemplate>
      <Headerlogo />
      <View style={{ alignItems: 'center', paddingTop: 20 }}>
        <Text
          style={{
            color: colors.warnaFont,
            fontSize: 30,
            textTransform: 'uppercase',
            fontWeight: 'bold',
          }}
        >
          Pilih Layanan
        </Text>
      </View>
      <ScrollView style={styles.main}>
        {/* card 1 */}
        <TouchableOpacity
          style={[styles.cardContainer, { paddingTop: 10 }]}
          onPress={onCardPress}
        >
          <View style={[styles.card, { backgroundColor: colors.warnaFont }]}>
            <Image source={produk} style={styles.cardImage} />
            <View
              style={{
                backgroundColor: colors.grey,
                width: 300,
                paddingVertical: 10,
              }}
            >
              <Text style={[styles.cardTitle, { color: colors.warnaFont }]}>
                Produk
              </Text>
            </View>
          </View>
        </TouchableOpacity>
        {/* card 2 */}
        <TouchableOpacity style={styles.cardContainer} onPress={onCard2Press}>
          <View style={[styles.card, { backgroundColor: colors.warnaFont }]}>
            <Image source={reservasi} style={styles.cardImage} />
            <View
              style={{
                backgroundColor: colors.grey,
                width: 300,
                paddingVertical: 10,
              }}
            >
              <Text style={[styles.cardTitle, { color: colors.warnaFont }]}>
                Reservasi
              </Text>
            </View>
          </View>
        </TouchableOpacity>

        {/* (Button dan komponen lainnya) */}
      </ScrollView>
    </ScreenTemplate>
  )
}

const styles = StyleSheet.create({
  cardContainer: {
    marginVertical: 10,
    borderRadius: 10,
    overflow: 'hidden',
    paddingHorizontal: 20,
  },
  card: {
    flexDirection: 'column',
    justifyContent: 'center',
    alignItems: 'center',
    padding: 20,
  },
  cardImage: {
    width: '100%', // Sesuaikan ukuran gambar
    height: 200, // Sesuaikan ukuran gambar

    marginBottom: 10,
  },
  cardTitle: {
    fontSize: fontSize.xLarge,
    textAlign: 'center',
    fontWeight: 'bold',
    textTransform: 'uppercase',
  },
  lightContent: {
    backgroundColor: colors.lightyellow,
    padding: 20,
    borderRadius: 5,
    marginTop: 30,
    marginLeft: 30,
    marginRight: 30,
  },
  darkContent: {
    backgroundColor: colors.gray,
    padding: 20,
    borderRadius: 5,
    marginTop: 30,
    marginLeft: 30,
    marginRight: 30,
  },
  main: {
    flex: 1,
    width: '100%',
  },
  title: {
    fontSize: fontSize.xxxLarge,
    marginBottom: 20,
    textAlign: 'center',
  },
  field: {
    fontSize: fontSize.middle,
    textAlign: 'center',
  },
})
